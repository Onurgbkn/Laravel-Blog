<div class="modal" id="ModalDelete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Yazı Sil</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
              <form action="{{route('posts.destroy')}}" method="get">
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
                            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>

                </form>
            </div>

        </div>
    </div>
</div>
