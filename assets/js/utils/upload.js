var Upload = {
    uploadFile: uploadFile,
    uploadFileDoc: uploadFileDoc,

};

function uploadFile(inputForm)
{
    var inputFile = inputForm[0].files[0];
    var inputFileName = inputFile.name;

    var formData = new FormData();
    formData.append('file', inputFile, inputFileName);

    return $.ajax({
        url: site_url + '/file/upload_image',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
    }).then(function (result)
    {

        return result;
    }, function (err)
    {
        return result;
    });

}

function uploadFileDoc(inputForm)
{
    var inputFile = inputForm[0].files[0];
    var inputFileName = inputFile.name;

    var formData = new FormData();
    formData.append('file', inputFile, inputFileName);

    return $.ajax({
        url: site_url + 'file/upload_docs',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        processData: false,
        contentType: false,
    }).then(function (result)
    {

        return result;
    }, function (err)
    {
        return result;
    });

}