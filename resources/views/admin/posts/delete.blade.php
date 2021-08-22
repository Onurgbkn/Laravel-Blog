<div class="modal" id="ModalDelete">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Yazıyi Sil</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
              <form action="{{route('deleteposts')}}" method="post" id="delete-form">
                @csrf
                <div class="form-group">
                    <p id="delTitle"></p>
                    <input type="hidden" id="postId" name="postId" value="">
                </div>
                <button type="submit" class="btn btn-primary">Onayla</button>
                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Kapat</button>

                </form>
            </div>

        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
$(document).ready(function() {

    $(document).on('click', "#delete-item", function() {
        $(this).addClass('delete-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
            'backdrop': 'static'
        };
        $('#ModalDelete').modal(options)
    })

    $('#ModalDelete').on('show.bs.modal', function() {
        var el = $(".delete-item-trigger-clicked"); // See how its usefull right here?
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('post-id');
        var title = row.children(".posttitle").text();


        // fill the data in the input fields
        $("#postId").val(id);
        $("#delTitle").text(title);

    })

    // on modal hide
    $('#ModalDelete').on('hide.bs.modal', function() {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#delTitle").text('');
        $("#postId").val('');
        $("#delete-form").trigger("reset");
    })
})


</script>
