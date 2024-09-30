<div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
      <img src="{{ Auth::user()->image ? Auth::user()->image : asset("frontend/images/ts-2.jpg") }}" alt="img" class="img-fluid">
      <p>{{ Auth::user()->name }}</p>
    </div>
  </div>