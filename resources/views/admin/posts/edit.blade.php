

<div class="modal" id="ModalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Yazı Düzenle</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
              <form action="{{route('updateposts')}}" method="post" enctype="multipart/form-data" id="edit-form">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInput">Yazı Başlığı</label>
                      <input type="text" class="form-control" for="exampleInput" id="eposttitle" name="title">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Kategori</label>
                      <select class="form-control" id="epostcategory" name="epostcategory">
                          @foreach ($categories as $category)
                              <option value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <textarea name="editor2" id="editor2"></textarea>
                        <script>
                            CKEDITOR.replace( 'editor2' );
                        </script>
                    </div>
                    <input type="hidden" id="postid" name="postid" value="">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>

                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
$(document).ready(function() {

    $(document).on('click', "#edit-item", function() {
        $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
            'backdrop': 'static'
        };
        $('#ModalEdit').modal(options)
    })

    $('#ModalEdit').on('show.bs.modal', function() {
        var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('post-id');
        var title = row.children(".posttitle").text();
        var category = row.children(".postcategory").text();
        var content = row.children(".postcontent").val();



        // fill the data in the input fields
        $("#postid").val(id);
        $("#eposttitle").val(title);
        $("#epostcategory").val(category);
        //$("#editor2").text(content);
        CKEDITOR.instances.editor2.setData(content);
        //$("#modal-input-description").val(description);
    })

    // on modal hide
    $('#ModalEdit').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#edit-form").trigger("reset");
    })

})


</script>
