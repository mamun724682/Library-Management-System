<?php

namespace App\Http\Middleware;

use Auth;
use App\IssueBook;
use App\Fine;
use Closure;

class FineBook
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->is_admin) {
            # code...
            $issueBooks = IssueBook::where('status', 0)->get();
        }else{
            $issueBooks = IssueBook::where('user_id', $user->id)->where('status', 0)->get();
        }

        foreach ($user as $u) {
            foreach ($issueBooks as $ib) {
                $now = date('Y-m-d'); // or your date as well
                if ($now > $ib->return_date) {

                    $date1=date_create($now);
                    $date2=date_create($ib->return_date);
                    $fineQuantity=date_diff($date1,$date2);
                    $fineQuantity=$fineQuantity->format("%a");
                    // $fineQuantity *= 2;

                    // $fineQuantity = int(date('Y-m-d') - $ib->return_date);

                    $userFine = Fine::where('user_id', $ib->user_id)->where('issue_id', $ib->id)->first();
                    if ($userFine) {
                        //update
                        $userFine->fine = $fineQuantity;
                        $userFine->save();
                    }else{
                        //create
                        $userFine = new Fine();
                        $userFine->user_id = $ib->user_id;
                        $userFine->issue_id = $ib->id;
                        $userFine->fine = $fineQuantity;
                        $userFine->save();
                    }

                }
            }
        }

        return $next($request);
    }
}
