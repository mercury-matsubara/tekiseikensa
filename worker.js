/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var fading = false;
var interval;
self.addEventListener('message', function(e){
    switch (e.data) {
        case 'start':
            if (!fading){
                fading = true;
                interval = setInterval(function(){
                    self.postMessage('tick');
                }, 1000);
            }
            break;
        case 'stop':
            clearInterval(interval);
            fading = false;
            break;
    };
}, false);