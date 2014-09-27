    function getImageData(folder) {
        $.ajax({
            type: "GET",
            //method: "get",
            url: "common/getFiles.php", // Der Pfad des PHP-Skriptes
            data: "folder=" + folder,
            contentType: "application/json; charset=utf-8",
            success: function (answer) {
                //alert(answer);
                var jsondata = JSON.parse(answer);

                function objLength(obj) {
                    var i = 0;
                    for (var x in obj) {
                        if (obj.hasOwnProperty(x)) {
                            i++;
                        }
                    }
                    return i;
                }

                var countfolders = 0;
                var countrows = 0;

                for (var i = 0; i < objLength(jsondata); i++) {
                    var elementURL = jsondata[i].path;

                    if (jsondata[i].type == "dir") {
                        //open recursive (onclick with jsondata[i].name)
                        countfolders++;
                        var elementParts = elementURL.split("/");
                        var folderElement = '';
                        folderElement += '<button type="button" class="btn btn-primary btn-lg item" id="folder_' + countfolders + '">';
                        folderElement += elementParts[elementParts.length - 2] + '</button>';
                        //append each folder-container to placeholder
                        $("#subfolderPlaceholder").append(folderElement);

                        //calling the click function for each button with correct URL
                        getSubfolderData(elementURL);

                        //change folder for reading data
                        function getSubfolderData(elementURL) {
                            $('#folder_' + countfolders).click(function () {
                                $('#imageThumbnails').empty();
                                getImageData(elementURL);
                            });
                        }
                    } else {

                        //var thumburl = folder+'/thumbs/'+jsondata[i];
                        var imagecontainer = '<div class="col-xs-12 col-md-4 col-lg-3 imagecontainer" id="image' + elementURL + '">';
                        imagecontainer += '<a href="' + elementURL + '" data-gallery class="thumbnail">';
                        imagecontainer += '<img data-src="' + elementURL + '" src="' + elementURL + '" class="img-responsive" >';
                        imagecontainer += '</a>';
                        imagecontainer += '</div>';
                        $("#imageThumbnails").append(imagecontainer); //last two : thumbs
                        $("#imageThumbnails").fadeIn("slow");
                    }
                }

                $('#subfolderPlaceholder .item').click(function (evt) {
                    evt.stopPropagation(); //stops the document click action
                    $(this).siblings().removeClass('active');
                    $(this).toggleClass('active');
                });

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("error: jqXHR: " + jqXHR + " textStatus: " + textStatus + " errorThrown: " + errorThrown);
            }
        });
    };



    $('#subfolderPlaceholder .item').click(function (evt) {
        evt.stopPropagation(); //stops the document click action
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');
    });
