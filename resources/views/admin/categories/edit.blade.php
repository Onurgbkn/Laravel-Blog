
<div class="modal" id="ModalEdit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Kategori Düzenle</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
              <form action="{{route('updatecategory')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInput">Kategori Adı</label>
                      <input type="text" class="form-control" name="name" id="editcategoryname">
                      <input type="hidden" id="editcategoryId" name="editcategoryId" value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Düzenle</button>
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
        var id = el.data('category-id');
        var title = row.children(".categoryname").text();


        $("#editcategoryId").val(id);
        $("#editcategoryname").val(title);
    })

    // on modal hide
    $('#ModalEdit').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
    })

})


</script>
