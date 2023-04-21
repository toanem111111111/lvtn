@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <!-- <li>vui long nhap</li> -->
            @endforeach
        </ul>
    </div>
@endif