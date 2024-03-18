<form class="modal-content text-center ajax-form" method="put"
    action="{{ route('admin.links.update', ['id' => $link->id]) }}">
    @csrf
    @method('put')
    <div class="modal-body text-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Icon </label>
                    <input type="text" class="form-control" name="icon" value="{{ $link->icon }}">
                </div>
                <span class="text-left text-danger">Please , visit this link to get your preffered icon <a
                        href="https://remixicon.com/" target="_blank">https://remixicon.com/</a>
                </span>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Link </label>
                    <input type="text" class="form-control" name="link" value="{{ $link->link }}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer text-center">
        <button class="custom-btn" type="submit">
            <i class="fa fa-plus"></i> Save change
        </button>
        <button type="button" class="custom-btn red-bc" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
        </button>
    </div>
</form>
