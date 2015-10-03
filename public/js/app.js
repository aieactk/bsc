$(document).ready(function() {
    $('.btn-confirm').click(function(e) {
        e.preventDefault();
        var $this = $(this);
        var $elmt = $('<div class="ui modal">'+
            '<i class="close icon"></i>'+
            '<div class="header">'+$this.attr('data-title')+'</div>'+
            '<div class="image content">'+$this.attr('data-message')+'</div>'+
            '<div class="actions">'+
                '<div class="ui black deny button">No</div>'+
                '<div class="ui positive right button">Yes</div>'+
            '</div>'+
        '</div>');
        $('.ui.positive.button', $elmt).on('click', function() {
            $($this.attr('data-target')).submit();
        });
        $elmt.modal();
        $elmt.appendTo('body');
        $elmt.modal('show');
        
    });
});