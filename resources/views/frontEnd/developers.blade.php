@extends('layouts.frontend')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading text-center">
    <b>About The Team</b>
  </div>
  <div class="panel-body">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-8">
              <div class="thumbnail">
                <img src="{{ asset('/devloper/1.jpg') }}" alt="No Image" width="100% "class="img-responsive">
                <div class="caption">
                  <h4>
                    <b>TARIF HOSSAIN</b>
                  </h4>
                  <br>

                  <label>Devloper</label>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-8">
              <div class="thumbnail">
                <img src="{{ asset('/devloper/66.PNG') }}" alt="No Image" class="img-responsive" width="100% ">
                <div class="caption">
                  <h4>
                    <b><a href="fb.com/mamun724682" target="_blank">ABDULLAH AL MAMUN</a></b>
                  </h4>
                  <br>

                  <label>Devloper</label>
                  <h3 class="pull-right">
                    <a href="https://twitter.com/mamun724682" class="w3_twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://fb.com/mamun724682" class="w3_facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-8">
              <div class="thumbnail">
                <img src="{{ asset('/devloper/3.jpg') }}" alt="No Image" class="img-responsive" width="100% ">
                <div class="caption">
                  <h4>
                    <b>FAHAD</b>
                  </h4>
                  <br>

                  <label>Devloper</label>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="col-md-12">
        <div class="col-sm-6" style="padding-left: 200px;">
          <div class="row">
            <div class="col-sm-7">
              <div class="thumbnail">
                <img src="{{ asset('/devloper/4.jpg') }}" alt="No Image" class="img-responsive" width="100% ">
                <div class="caption">
                  <h4>
                    <b>IMRUL KAYES</b>
                  </h4>
                  <br>

                  <label>Devloper</label>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-5" style="padding-left: 140px;">
          <div class="row">
            <div class="col-sm-8">
              <div class="thumbnail">
                <img src="{{ asset('/devloper/5.jpg') }}" alt="No Image" class="img-responsive" width="100% ">
                <div class="caption">
                  <h4>
                    <b>SOYKOT PAROI</b>
                  </h4>
                  <br>
                  <label>Devloper</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

