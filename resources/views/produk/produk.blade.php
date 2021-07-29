<x-app-layout>

<div class="container mt-5">
    <div class="row">
        <div class="col">

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">

                <label for="ProdukName" class="form-label">Nama Produk</label>
                <input type="text" class="form-control mb-3" id="ProdukName" name="namaProduk">

                <label for="ProdukImg" class="form-label">Image</label>
                <input type="file" class="form-control" id="ProdukImg" name="imgProduk" multiple>

            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        </div>
    </div>
    <div class="row">
        <div class="col"></div>
    </div>
</div>

</x-app-layout>
