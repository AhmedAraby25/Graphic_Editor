//Prevent typing in number fields, just increase/decrease values from show arrows
$('input[type=number]').keypress(function(e) {
    return false
});


//Listener on check-boxes in the page (which they are shapes)
$('input[type=checkbox]').change(
    function(){
        if (this.checked) {
            $("#shapes_properties").css('display', 'block');
            $("."+this.value + "-section").css('visibility', 'visible');
        }
        else
        {
            $("#shapes_properties").css('display', 'none');
            $("."+this.value + "-section").css('visibility', 'hidden');
        }
    });

//validate inputs
$("#submit-button").click(function() {

    var SPACE_REGEX = /^\s+$/;

    var jsonData = {"shapes": []};

    if ($("#circleCheck").prop("checked")) {
        var circlePerimeter = $("#circle-perimeter").val();
        var circleBorderColor = $("#circle-border-color").val();
        var circleBorderWidth = $("#circle-border-width").val();

        if (circlePerimeter && circleBorderColor && !SPACE_REGEX.test(circleBorderColor) && circleBorderWidth) {
            border = {
                "width": circleBorderWidth,
                "color": circleBorderColor
            };
            circle = {
                "type": "circle",
                "perimeter": circlePerimeter,
                "border": border
            };
            ///push circle into array of shapes, etc
            jsonData.shapes.push(circle);
        }
    }

    if ($("#squareCheck").prop("checked")) {
        var sideLength = $("#side-length").val();
        var squareBorderColor = $("#square-border-color").val();
        var squareBorderWidth = $("#square-border-width").val();

        if (sideLength && squareBorderColor && !SPACE_REGEX.test(squareBorderColor) && squareBorderWidth) {
            border = {
                "width": squareBorderWidth,
                "color": squareBorderColor
            };
            square = {
                "type": "square",
                "sideLength": sideLength,
                "border": border
            };
            ///push square into array of shapes, etc
            jsonData.shapes.push(square);
        }
    }

    if ($("#rectangleCheck").prop("checked")) {
        var rectangleHeight = $("#rectangle-height").val();
        var rectangleWidth = $("#rectangle-width").val();
        var rectangleBorderWidth = $("#rectangle-border-width").val();
        var rectangleBorderColor = $("#rectangle-border-color").val();

        if (rectangleHeight && rectangleWidth && rectangleBorderWidth && rectangleBorderColor
            && !SPACE_REGEX.test(rectangleBorderColor)) {
            border = {
                "width": rectangleBorderWidth,
                "color": rectangleBorderColor
            };
            rectangle = {
                "type": "rectangle",
                "width": rectangleWidth,
                "height": rectangleHeight,
                "border": border
            };
            ///push rectangle into array of shapes, etc
            jsonData.shapes.push(rectangle);
        }
    }

    //submit
    if(jsonData.shapes.length > 0) {
        $.ajax({
            type: "POST",
            url: "../../graphic_editor_test/GraphicEditorStarter.php",
            data: {json: JSON.stringify(jsonData)},
            success: function( data, textStatus, jQxhr ){
                $("#response").css('visibility', 'visible');
                $("#response").html(JSON.stringify(data));
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log("ERROR");
                console.log( errorThrown );
            }
        });
    }

});



