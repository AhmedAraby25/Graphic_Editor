# Graphic_Editor
Graphic editor task for NETA. 

## Full Description

Develop a simple web app called “Graphic Editor” which draws geometric shapes such as
circle, square, rectangle, ellipse... etc. Each shape might have various attributes like border
color and size, fill color... etc.
Your app should support adding more shapes quickly, easily and with minimum code
changes. You need to provide the implementation for at least 2 shapes of your choice.
You may use testing frameworks and/or simple API frameworks like Silex or Lumen.

### Input:
Your app should expose an endpoint which receives JSON input:
```json
{
  "shapes": [
    {
      "type": "circle",
      "perimeter": 10,
      "border": {
        "color": "red",
        "width": 1
      }
    },
    {
      "type": "square",
      "sideLength": 10,
      "border": {
        "color": "#776cff",
        "width": 2
      }
    },
    {
      "type": "rectangle",
      "width": 10,
      "height": 10,
      "border": {
        "color": "#776cff",
        "width": 2
      }
    }
  ]
}
```
### Output:
Your app should display the result (i.e. the drawn shapes) in any format: array of points,
image (binary file)... etc.


## Solution
The solution is implemented by native OOP PHP using [Strategy Pattern](https://en.wikipedia.org/wiki/Strategy_pattern) and [Factory Pattern](https://en.wikipedia.org/wiki/Factory_(object-oriented_programming))

### Software Design
Desing is followed by this structure:
<a href="https://ibb.co/XjNdm9s"><img src="https://i.ibb.co/q7X4bzs/shape.jpg" alt="shape" border="0"></a>

```steps
1- Just I have used Abstract class Shape instead of Interface as we have common attribute called Border then the all other shapes will extend the abstract class with its common attribute.
2- Demo class is represented in my code to GraphicEditorStarter class as it is about the main gateway for the application
3- each concrete shape class implement its own  draw function and have its own attributes
4- ShapeFactory class is the apply of factory design pattern while the list of concrete shapes classes which extend from shape abstract class are the application of strategy pattern
```
### Steps to run the application
Just clone the repo in your Apache root directory then browse the project directory as follow: 
```web
localhost:$port/graphic_editor_test/
```
### You can find the output binary files of the created shapes in the following structure directory:
```directory
-- graphic_editor_test/
---- shapesBinary/
```
