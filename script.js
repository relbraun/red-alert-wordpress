/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function($){
    var redAlertPikudOref=function(jsonUrl,url){
        var main_div=jQuery('<div class="red-alert"><div class="icon-alert"><image src="wp-content/plugins/red-alert/icon.png"></div></div>');
        var msg_div=$('<div class="alert-msg"></div>');
        var self=this
    //main_div.appendTo(jQuery('body'));
        jQuery('body').append(main_div);
        msg_div.appendTo(main_div);
        var cities=$.getJSON(jsonUrl,function(data){
            self.cities=(data);
            
        });
        $('footer').click(function(){animateit();}).dblclick(function(){unanimateit();});
        function getAlarm(){
            var data={action:'red_alert_msg'};
            $.ajax({url:url,
                crossDomain: true,
                dataType: 'json',
                data:data,
                type: 'GET',
                success: function(data){
                    if(data.data.length > 0){
                        msg_div.html(data.title + parseCities(data.data));
                        animateit();
                    }
                    else
                        unanimateit();
                }  
            });
        }
        function parseCities(city){
            var msg=': ';
            var ci=[];
            $.each(city,function(key,val){
                msg+=self.cities[val].join(' ')+' ';
                
            });
            return msg;
        }
        function animateit(){
            main_div.animate({'bottom':'0px'},200);
        }
        function unanimateit(){
            main_div.animate({'bottom':'-90px'},200);
        }
   
        setInterval(getAlarm,3000);
    }
window.redAlertPikudOref=redAlertPikudOref;
})(jQuery);
