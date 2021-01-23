
@if(session('mensaje'))
    <div class="alert bg-success alert-dismissible" id="alert" data-auto-dismiss="1500">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Mensaje Foconcito </h5>
            <div class="alert alert-success">
                <ul>
                        <li>{{ session('mensaje') }}</li>
                </ul>
            </div>
    </div>
@endif