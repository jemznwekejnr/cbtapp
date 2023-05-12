<div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ asset('assets/img/partnership.jpeg') }}" alt="PEN">
              </div>
              <div class="card-body">
                <div class="author">
                  <!--<a href="#">-->
                    <img class="avatar border-gray" src="{{ !empty(Auth::user()->passport) ? asset(Auth::user()->passport) : asset('assets/img/avatar.png') }}" alt="...">
                    <h5 class="title">{{ Auth::user()->name }}</h5>
                  <!--</a>-->
                  <p class="description">
                    {{ Auth::user()->email }}
                  </p>
                </div>
                <p class="description text-center">
                  {{ Auth::user()->phone }}
                </p>
              </div>
              <p class="description text-center">
                  {{ Auth::user()->membertype }}
                </p>
              <hr>
              <div class="button-container">
                <p class="description text-center">
                  <button type="button" class="btn btn-round btn-success">{{ Auth::user()->status }}</button>
                </p>
              </div>
              <div id="breakdown">
              <div id="breakdowndata"></div>
              </div>
            </div>
          </div>