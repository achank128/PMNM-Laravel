$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function removeRow(id,url){
    if(confirm("bạn có chắc chắn muốn xóa bản ghi này không?")){
        $.ajax({
            type: 'DELETE',
            datatype:JSON,
            url:url,
            data:{id},
            success:function (result){
                console.log(result);
                if(result.error=='false'){
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert("Xóa bản ghi thất bại");
                }
            }
        })
    }
}
