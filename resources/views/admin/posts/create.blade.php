



<div class="modal" id="ModalCreate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Yazı Ekle</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
              <form action="{{route('createposts')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInput">Yazı Başlığı</label>
                      <input type="text" class="form-control" id="exampleInput" name="title">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Kategori</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="category">
                          @foreach ($categories as $category)
                              <option>{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <textarea name="editor1"></textarea>
                        <script>
                                CKEDITOR.replace( 'editor1' );
                        </script>
                    </div>
                    <button type="submit" class="btn btn-primary">Oluştur</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Kapat</button>

                </form>
            </div>

        </div>
    </div>
</div>
