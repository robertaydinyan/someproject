

var folder = $('.file-tree li.file-tree-folder'),
    treeBtn = $('.file-tree li.file-tree-folder span').not('.fa-plus'),
    file = $('.file-tree li');

treeBtn.on("click", function(a) {
    $(this).parent("li").children('ul').slideToggle(100, function() {
        $(this).parent("li").toggleClass("open");
        localStorage.clear();
        $('.file-tree-folder').not('.open').each(function(){
            var key_ = $(this).find('span').first().attr('data-name');
            localStorage.setItem(key_, true);
        });
    }), a.stopPropagation()
})

$(document).ready ( function(){
    treeBtn.parent("li").children('ul').slideToggle(100, function() {
        $(this).parent("li").toggleClass("open")
    });
});