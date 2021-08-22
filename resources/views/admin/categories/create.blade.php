

<div class="modal" id="ModalCreate">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Kategori Ekle</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
              <form action="{{route('createcategory')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInput">Kategori Adı</label>
                      <input type="text" class="form-control" id="exampleInput" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>

                </form>
            </div>

        </div>
    </div>
</div>
