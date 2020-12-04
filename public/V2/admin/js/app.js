function deleteEl(el,id,url,title,confirmText,cancelText,successMessage,isCategory=false){
    Swal.fire({
        title: title,
        showCancelButton: true,
        confirmButtonColor: "#dd6b55",
        confirmButtonText: confirmText,
        cancelButtonText: cancelText,
    }).then((confirmed) => {
        if(!confirmed.value) return;
        $.ajax({
            type: "POST",
            url:  url,
            success: function (response) {
                if(response.message === 'success'){
                    Swal.fire(successMessage, '', 'success')
                    if(isCategory){
                        $(el).parents('li').remove();
                    }else{
                        $(el).parents('tr').remove();
                    }
                }
            },
            error: function (response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Səhv...',
                    text: response.message,
                })
            }
        })
    })
}

// Slug Generator (slugify)
function slugify(string) {
    const a = 'àáâäæãåāăąəçćčđďèéêëēėęěğǵḧîïíīįìıłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
    const b = 'aaaaaaaaaaecccddeeeeeeeegghiiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
    const p = new RegExp(a.split('').join('|'), 'g')

    return string.toString().toLowerCase()
        .replace(/\s+/g, '-') // Replace spaces with -
        .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
        .replace(/&/g, '-and-') // Replace & with 'and'
        .replace(/[^\w\-]+/g, '') // Remove all non-word characters
        .replace(/\-\-+/g, '-') // Replace multiple - with single -
        .replace(/^-+/, '') // Trim - from start of text
        .replace(/-+$/, '') // Trim - from end of text
}


