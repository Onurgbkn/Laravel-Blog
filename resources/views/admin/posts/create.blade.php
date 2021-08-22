



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
              <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
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
                        <div id="myeditor" style="height: 400px">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>

                </form>
            </div>

        </div>
    </div>
</div>
