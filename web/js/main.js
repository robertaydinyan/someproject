$(document).ready(function() {

});


class Events {

    static createCategory() {
        if ($('.category-name').val()) {
            $('.create-category-form').submit();
        }
    }

    static addCategory($id) {
        $('.category-parent-id').val($id);
    }
}