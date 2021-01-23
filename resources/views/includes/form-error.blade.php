@if($errors->any())
    <div class="alert alert-danger alert-dismissible" id="alert" data-auto-dismiss="4000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Hay errores!</h5>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p><i class="fas fa-times"></i>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
    </div>
@endif