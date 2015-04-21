/*

  jQuery ready function.

  Specify a function to execute when the DOM is fully loaded.

*/

$(document).ready( function ()

{

  /*

    on button click we are assigning click handler

  */

  $("#togglecheckbox").click(function()

  {

    /*

      storing checkbox dom into variablbe

    */

    var checkBox = $(".checkbox");

    var button = $("#togglecheckbox");

    /*

      manually trigger checkbox click event

    */

    checkBox.trigger('click');

    button.attr("value", button.attr("value") == "Select All" ? "De-Select All" : "Select All");

  }); 

});