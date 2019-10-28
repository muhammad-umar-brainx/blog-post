$(document).ready(function () {

    $("[id^='delete_']").click(function () {
        let id = $(this).attr('id');
        id = id.replace("delete_", "");

        let blog_id = "delete_blog_id_" + id;

        $('input[name ="delete_blog"]').val(id);

    });

    $("[id^='edit_']").click(function () {
        let id = $(this).attr('id');

        id = id.replace("edit_", "");

        let blog_id = "blog_id_" + id;
        let blog_name = "blog_name_" + id;
        let blog_creator = "blog_creator_" + id;

        console.log(blog_id);
        console.log(blog_name);
        console.log(blog_creator);


        $("#e_blog_id").val($(`#${blog_id}`).text());
        $("#e_blog_name").val($(`#${blog_name}`).text());
        $("#e_blog_creator").val($(`#${blog_creator}`).text());

        // $("#e_blog_creator").on('focus', function() {
        //     var $this = $(this);
        //     if ($this.hasClass('placeholder')) {
        //         $this.removeClass('placeholder');
        //         $this.val('');
        //     }
        // });

    });


    // $('td[name ="tcol1"]')

    // $("#edit_1").click(function () {
    //     alert( $(this).attr('id') );
    // });


    // $("p").click(function () {
    //     alert( $(this).attr('id') );
    // });

});