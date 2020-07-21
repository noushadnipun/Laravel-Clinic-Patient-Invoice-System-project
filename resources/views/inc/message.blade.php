
    @if(Session::has('savemsg') == true)
        <div class="alert alert-success" role="alert">
            {{ Session::get('savemsg') }}
        </div>
    @endif

 <!-- // Show Delete Message -->
    @if(Session::get('dltlmsg') == true)
    <div class="alert alert-danger" role="alert">
        {{ Session::get('dltlmsg') }}
    </div>
    @endif

    <!-- //Showroom Update Message -->
    @if(Session::has('updatemsg') == true)
        <div class="alert alert-success" role="alert">
           {{ Session::get('updatemsg') }}
        
        </div>
    @endif