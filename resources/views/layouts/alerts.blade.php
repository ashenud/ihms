<div class="alert-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if (Session::has('message'))
                    <div class="alert {{Session::get('alert-class')}} alert-dismissible fade show animated fadeIn" data-auto-dismiss="2000" role="alert">
                        <strong> {{Session::get('message')}} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"> &times; </span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>