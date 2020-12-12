<div class="container">
    <div class="mb-4 row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Jersey</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <h2>{{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <div class="mb-3 input-group">
                <input wire:model="search" type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>

    <section class="mb-5 products">
        <div class="mt-4 row">
            @foreach ($products as $product)
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="text-center card-body">
                            <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">
                            <div class="mt-2 row">
                                <div class="col-12">
                                    <h5><strong>{{ $product->nama }}</strong></h5>
                                    <h5>Rp.{{ number_format($product->harga) }}</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="{{route('products.detail', $product->id)}}" class="btn btn-dark btn-block"><i class="mr-2 fas fa-eye"></i>Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>   
        <div class="row">
            <div class="col-12">
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
