<extend name="Base:index" />
<block name="content">
                    <form role="form" action="{:U('add')}" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="logo-upload">商品LOGO</label>
                            <input type="file" id="logo-upload">
                            <input type="hidden" name="logo" id="logo"/>
                            <img src="" id="logo-preview" style="max-width: 100px;max-height: 100px"/>
                        </div>
                        </form>

</block>
<block name="extra">

    <script src="http://admin.shop.com/Public/ext/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $('#logo-upload').uploadify({
                height: 30,
                swf: '__UPLOADIFY__/uploadify.swf',
                uploader: '{:U("Upload/upload")}',
                width: 120,
                buttonText: '商品logo',
                fileTypeExts: '*.jpg;*.jpeg;*.jpe;*.png;*.gif',
                onUploadSuccess: function (file, data) {
                    data = $.parseJSON(data);
                    if (data.status) {
                        $('#logo').val(data.url);
                        $('#logo-preview').attr('src', data.url);
                        $('#logo-upload').attr('logo', data.url);
                    } else {
                        layer.alert(data.msg, {icon: 5});
                    }
                },
            });
        });
    </script>
</block>
