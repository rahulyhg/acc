/**
 * Create Time Picker (for PHPMaker 2019)
 * @license (C) 2018 e.World Technology Ltd.
 */
ew.createTimePicker=function(e,t,i){if(t.indexOf("$rowindex$")>-1)return;var r=jQuery,n=ew.getElement(t,e),o=r(n);if(o.hasClass("ui-timepicker-input"))return;if(i.timeFormat&&ew.TIME_SEPARATOR!=":")i.timeFormat=i.timeFormat.replace(/:/g,ew.TIME_SEPARATOR);var a=r.isBoolean(i.inputGroup)?i.inputGroup:true;delete i.inputGroup;o.timepicker(i).on("showTimepicker",function(){o.data("timepicker-list").width(o.outerWidth()-2)});if(a){var u=r('<button type="button"><i class="fa fa-clock-o"></i></button>').addClass("btn btn-default").css({"font-size":o.css("font-size"),height:o.outerHeight()}).click(function(){o.timepicker("show")});o.wrap('<div class="input-group"></div>').after(r('<div class="input-group-append"></div>').append(u))}};