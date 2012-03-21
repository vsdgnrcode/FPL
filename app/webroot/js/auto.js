// create REDIPS namespace (if is not already defined in another REDIPS package)
var REDIPS = REDIPS || {};

var autocomp = {
    delay : 100,
    height : 100,
    timer : null, 
    url : '',
    oInput : null,
    div : null,
    request : null,
    init : function() {
        this.div = document.getElementById('auto_id');	
        this.div.onmouseover = this.focus;
        // set styles (workaround for IE browser)
        this.div.style.cssText = 'position:absolute;background-color:white;z-index:999;height:' + this.height + 'px';
        // hide popup if clicked anywhere on the page
        // IE needs to stop event bubbling if clicking to the item in multiple select: onclick = "window.event.cancelBubble = true"
        REDIPS.event.add(document, 'click', this.hide);
        
    },
    initXMLHttpClient : function () {
        var XMLHTTP_IDS,
        xmlhttp,
        success = false,
        i;
        // Mozilla/Chrome/Safari/IE7/IE8 (normal browsers)
        try {
            xmlhttp = new XMLHttpRequest(); 
        }
        // IE (?!)
        catch (e1) {
            XMLHTTP_IDS = [ 'MSXML2.XMLHTTP.5.0', 'MSXML2.XMLHTTP.4.0',
            'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP', 'Microsoft.XMLHTTP' ];
            for (i = 0; i < XMLHTTP_IDS.length && !success; i++) {
                try {
                    success = true;
                    xmlhttp = new ActiveXObject(XMLHTTP_IDS[i]);
                }
                catch (e2) {}
            }
            if (!success) {
                throw new Error('Unable to create XMLHttpRequest!');
            }
        }
        return xmlhttp;
    },

    show : function () {
        autocomp.div.style.visibility = 'visible';
    },
    focus : function () {
        autocomp.firstBlur = true; 
        autocomp.div.getElementsByTagName('select')[0].focus();
    },

    keydown : function (field, e,l) {
        
        //alert(field.id);
        this.url = l;
        // keydown in input field
        if (field.nodeName === 'INPUT') {
            //alert (field.id);
            // set current input field
            this.oInput = field;
            switch (e.keyCode || window.event.keyCode) {
                // tab, enter, shift, ctrl, alt, pause, caps lock
                case 9:
                case 13:
                case 16:
                case 17:
                case 18:
                case 19:
                case 20:
                // page up, page down, end, home, arrow left, arrow up, arrow right
                case 33:
                case 34:
                case 35:
                case 36:
                case 37:
                case 38:
                case 39:
                // insert, scroll lock
                case 45:
                case 145:
                // F1,F2,F3,F4,F5,F6
                case 112:
                case 113:
                case 114:
                case 115:
                case 116:
                case 117:
                // F7,F8,F9,F10,F11,F12
                case 118:
                case 119:
                case 120:
                case 121:
                case 122:
                case 123:
                    break;
                // escape (hide div element)
                case 27:
                    autocomp.div.style.visibility = 'hidden';
                    break;
                // arrow down (set focus to popup)
                case 40:
                    //alert(this.div.getElementsByTagName('select')[0]);
                    this.div.getElementsByTagName('select')[0].focus();
                    //focus();
                    break;
                // backspace, delete
                case 8:
                case 46:
                    setTimeout('autocomp.sendURL()',10);
                    //this.sendURL();
                    break;
                //  and default
                default:
                    setTimeout('autocomp.sendURL()',10);
                    break;
            }
        }
         else {
            switch (e.keyCode || window.event.keyCode) {
                // escape, backspace (hide popup and set focus to the input field)
                case 27:
                case 8:
                    autocomp.div.style.visibility = 'hidden';
                    this.oInput.focus();
                    break;
                // tab, enter (set value to the input field)
                case 9:
                case 13:
                    this.selected(field);
                    break;
            }
        }
    },
    selected : function (oSelect) {
        //alert("hi");
        var idx = oSelect.selectedIndex;
        autocomp.oInput.value = oSelect.options[idx].text;
        autocomp.div.style.visibility = 'hidden';
        autocomp.oInput.focus();
    },

    sendURL : function () {  
        var oTop = 0,
        oLeft = 0,  
        box = this.oInput;
        // if user deletes content from input box, then hide popup and return
        if (this.oInput.value.length == 0) {
            autocomp.div.style.visibility = 'hidden';
            return;
        }
        // find input field position
        do {
            oLeft += box.offsetLeft;
            oTop += box.offsetTop;
            box = box.offsetParent;
        }
        while (box);
        // set top and left position of DIV element regarding to input element
        this.div.style.top = (oTop + this.oInput.offsetHeight) + 'px';
        this.div.style.left = oLeft + 'px';
        // set width to the DIV element the same as width of the input field
        this.div.style.width = this.oInput.offsetWidth + 'px';
        
        var request = this.initXMLHttpClient();
        //alert(this.url);

        request.open('GET', this.url + '/' + this.oInput.value, true);
        // the onreadystatechange event is triggered every time the readyState changes
        request.onreadystatechange = function () {
            var output;
            //alert(request.responseText);
            // request is finished and response is ready
            if (request.readyState === 4) {
                if (request.status === 200) {
                    output = '<select multiple onclick="autocomp.selected(this)" ' +
                    'onkeydown = "autocomp.keydown(this, event)" ' +
                    
                    'style = "width:100%; height:100%">';
                    var content = eval('('+ request.responseText +')');
                   // alert(content);
                    if(content.length == 0)
                    {
                        autocomp.div.style.visibility = 'hidden';
                    }
                    else
                    {
                        for(var i=0; i < content.length; i++)
                        { 
                            output = output + "<option>" + content[i].name + "</option>";
                        }
						
                        //output = output + request.responseText;
                        autocomp.div.innerHTML = output + '</select>';
                        autocomp.div.style.visibility = 'visible';
                    }
                    //alert(autocomp.div.innerHTML);
                }
                // if request status is not OK then display error
                else {
                    autocomp.div.innerHTML = 'Error: [' + request.status + '] ' + request.statusText;
                }
            }
        };
        // send request
        request.send(null);
    }

}



// if REDIPS.event isn't already defined (from other REDIPS file) 
if (!REDIPS.event) {
    REDIPS.event = (function () {
        var add,	// add event listener
        remove;	// remove event listener
		
        // http://msdn.microsoft.com/en-us/scriptjunkie/ff728624
        // http://www.javascriptrules.com/2009/07/22/cross-browser-event-listener-with-design-patterns/
        // http://www.quirksmode.org/js/events_order.html

        // add event listener
        add = function (obj, eventName, handler) {
            if (obj.addEventListener) {
                // (false) register event in bubble phase (event propagates from from target element up to the DOM root)
                obj.addEventListener(eventName, handler, false);
            }
            else if (obj.attachEvent) {
                obj.attachEvent('on' + eventName, handler);
            }
            else {
                obj['on' + eventName] = handler;
            }
        };
	
        // remove event listener
        remove = function (obj, eventName, handler) {
            if (obj.removeEventListener) {
                obj.removeEventListener(eventName, handler, false);
            }
            else if (obj.detachEvent) {
                obj.detachEvent('on' + eventName, handler);
            }
            else {
                obj['on' + eventName] = null;
            }
        };
	
        return {
            add		: add,
            remove	: remove
        }; // end of public (return statement)	
		
    }());
}