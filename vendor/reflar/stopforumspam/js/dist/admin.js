module.exports=function(t){var e={};function n(r){if(e[r])return e[r].exports;var o=e[r]={i:r,l:!1,exports:{}};return t[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}return n.m=t,n.c=e,n.d=function(t,e,r){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)n.d(r,o,function(e){return t[e]}.bind(null,o));return r},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p="",n(n.s=3)}([function(t,e){t.exports=flarum.core.compat.app},function(t,e){t.exports=flarum.core.compat["components/Switch"]},function(t,e){t.exports=flarum.core.compat["components/SettingsModal"]},function(t,e,n){"use strict";n.r(e);var r=n(0),o=n.n(r);var s=n(2),i=n.n(s),a=n(1),l=n.n(a),u=function(t){function e(){return t.apply(this,arguments)||this}!function(t,e){t.prototype=Object.create(e.prototype),t.prototype.constructor=t,t.__proto__=e}(e,t);var n=e.prototype;return n.className=function(){return"StopForumSpamSettingsModal Modal--small"},n.title=function(){return"StopForumSpam Settings"},n.form=function(){return[m("div",{className:"Form-group"},l.a.component({state:this.setting("sfs.username",0)(),onchange:this.setting("sfs.username",1),children:"Username spam check"})),m("div",{className:"Form-group"},l.a.component({state:this.setting("sfs.ip",0)(),onchange:this.setting("sfs.ip",1),children:"IP spam check"})),m("div",{className:"Form-group"},l.a.component({state:this.setting("sfs.email",0)(),onchange:this.setting("sfs.email",1),children:"Email spam check"})),m("div",{className:"helpText"},m("p",null,"This is the number of spam reports between all enabled checks that will trip the spam filter"),m("p",null,"Ex: If the email has 1 hit, and the ip has 2 hits, there will be 3 hits in total. If the threshold is set to 3 or less it will prevent the registration.")),m("div",{className:"Form-group"},m("label",null,"Threshold"),m("input",{className:"FormControl",bidi:this.setting("sfs.frequency")}))]},e}(i.a);o.a.initializers.add("reflar-stopforumspam",function(){o.a.extensionSettings["reflar-stopforumspam"]=function(){return o.a.modal.show(new u)}})}]);
//# sourceMappingURL=admin.js.map