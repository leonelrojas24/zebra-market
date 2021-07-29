/*! This file is auto-generated */
window.wp=window.wp||{},function(t,a){var o={},s=Array.prototype.slice,r=function(){},n=function(t,e,n){var i=e&&e.hasOwnProperty("constructor")?e.constructor:function(){return t.apply(this,arguments)};return a.extend(i,t),r.prototype=t.prototype,i.prototype=new r,e&&a.extend(i.prototype,e),n&&a.extend(i,n),(i.prototype.constructor=i).__super__=t.prototype,i};o.Class=function(t,e,n){var i,s=arguments;return t&&e&&o.Class.applicator===t&&(s=e,a.extend(this,n||{})),(i=this).instance&&a.extend(i=function(){return i.instance.apply(i,arguments)},this),i.initialize.apply(i,s),i},o.Class.extend=function(t,e){e=n(this,t,e);return e.extend=this.extend,e},o.Class.applicator={},o.Class.prototype.initialize=function(){},o.Class.prototype.extended=function(t){for(var e=this;void 0!==e.constructor;){if(e.constructor===t)return!0;if(void 0===e.constructor.__super__)return!1;e=e.constructor.__super__}return!1},o.Events={trigger:function(t){return this.topics&&this.topics[t]&&this.topics[t].fireWith(this,s.call(arguments,1)),this},bind:function(t){return this.topics=this.topics||{},this.topics[t]=this.topics[t]||a.Callbacks(),this.topics[t].add.apply(this.topics[t],s.call(arguments,1)),this},unbind:function(t){return this.topics&&this.topics[t]&&this.topics[t].remove.apply(this.topics[t],s.call(arguments,1)),this}},o.Value=o.Class.extend({initialize:function(t,e){this._value=t,this.callbacks=a.Callbacks(),this._dirty=!1,a.extend(this,e||{}),this.set=a.proxy(this.set,this)},instance:function(){return arguments.length?this.set.apply(this,arguments):this.get()},get:function(){return this._value},set:function(t){var e=this._value;return t=this._setter.apply(this,arguments),null===(t=this.validate(t))||_.isEqual(e,t)||(this._value=t,this._dirty=!0,this.callbacks.fireWith(this,[t,e])),this},_setter:function(t){return t},setter:function(t){var e=this.get();return this._setter=t,this._value=null,this.set(e),this},resetSetter:function(){return this._setter=this.constructor.prototype._setter,this.set(this.get()),this},validate:function(t){return t},bind:function(){return this.callbacks.add.apply(this.callbacks,arguments),this},unbind:function(){return this.callbacks.remove.apply(this.callbacks,arguments),this},link:function(){var t=this.set;return a.each(arguments,function(){this.bind(t)}),this},unlink:function(){var t=this.set;return a.each(arguments,function(){this.unbind(t)}),this},sync:function(){var t=this;return a.each(arguments,function(){t.link(this),this.link(t)}),this},unsync:function(){var t=this;return a.each(arguments,function(){t.unlink(this),this.unlink(t)}),this}}),o.Values=o.Class.extend({defaultConstructor:o.Value,initialize:function(t){a.extend(this,t||{}),this._value={},this._deferreds={}},instance:function(t){return 1===arguments.length?this.value(t):this.when.apply(this,arguments)},value:function(t){return this._value[t]},has:function(t){return void 0!==this._value[t]},add:function(t,e){var n,i,s=this;if("string"==typeof t)n=t,i=e;else{if("string"!=typeof t.id)throw new Error("Unknown key");n=t.id,i=t}return s.has(n)?s.value(n):((s._value[n]=i).parent=s,i.extended(o.Value)&&i.bind(s._change),s.trigger("add",i),s._deferreds[n]&&s._deferreds[n].resolve(),s._value[n])},create:function(t){return this.add(t,new this.defaultConstructor(o.Class.applicator,s.call(arguments,1)))},each:function(n,i){i=void 0===i?this:i,a.each(this._value,function(t,e){n.call(i,e,t)})},remove:function(t){var e=this.value(t);e&&(this.trigger("remove",e),e.extended(o.Value)&&e.unbind(this._change),delete e.parent),delete this._value[t],delete this._deferreds[t],e&&this.trigger("removed",e)},when:function(){var e=this,n=s.call(arguments),i=a.Deferred();return"function"==typeof n[n.length-1]&&i.done(n.pop()),a.when.apply(a,a.map(n,function(t){if(!e.has(t))return e._deferreds[t]=e._deferreds[t]||a.Deferred()})).done(function(){var t=a.map(n,function(t){return e(t)});t.length===n.length?i.resolveWith(e,t):e.when.apply(e,n).done(function(){i.resolveWith(e,t)})}),i.promise()},_change:function(){this.parent.trigger("change",this)}}),a.extend(o.Values.prototype,o.Events),o.ensure=function(t){return"string"==typeof t?a(t):t},o.Element=o.Value.extend({initialize:function(t,e){var n,i,s=this,r=o.Element.synchronizer.html;this.element=o.ensure(t),this.events="",this.element.is("input, select, textarea")&&(t=this.element.prop("type"),this.events+=" change input",r=o.Element.synchronizer.val,this.element.is("input")&&o.Element.synchronizer[t]&&(r=o.Element.synchronizer[t])),o.Value.prototype.initialize.call(this,null,a.extend(e||{},r)),this._value=this.get(),n=this.update,i=this.refresh,this.update=function(t){t!==i.call(s)&&n.apply(this,arguments)},this.refresh=function(){s.set(i.call(s))},this.bind(this.update),this.element.on(this.events,this.refresh)},find:function(t){return a(t,this.element)},refresh:function(){},update:function(){}}),o.Element.synchronizer={},a.each(["html","val"],function(t,e){o.Element.synchronizer[e]={update:function(t){this.element[e](t)},refresh:function(){return this.element[e]()}}}),o.Element.synchronizer.checkbox={update:function(t){this.element.prop("checked",t)},refresh:function(){return this.element.prop("checked")}},o.Element.synchronizer.radio={update:function(t){this.element.filter(function(){return this.value===t}).prop("checked",!0)},refresh:function(){return this.element.filter(":checked").val()}},a.support.postMessage=!!window.postMessage,o.Messenger=o.Class.extend({add:function(t,e,n){return this[t]=new o.Value(e,n)},initialize:function(t,e){var n=window.parent===window?null:window.parent;a.extend(this,e||{}),this.add("channel",t.channel),this.add("url",t.url||""),this.add("origin",this.url()).link(this.url).setter(function(t){var e=document.createElement("a");return e.href=t,e.protocol+"//"+e.host.replace(/:(80|443)$/,"")}),this.add("targetWindow",null),this.targetWindow.set=function(t){var e=this._value;return t=this._setter.apply(this,arguments),null===(t=this.validate(t))||e===t||(this._value=t,this._dirty=!0,this.callbacks.fireWith(this,[t,e])),this},this.targetWindow(t.targetWindow||n),this.receive=a.proxy(this.receive,this),this.receive.guid=a.guid++,a(window).on("message",this.receive)},destroy:function(){a(window).off("message",this.receive)},receive:function(t){var e;t=t.originalEvent,this.targetWindow&&this.targetWindow()&&(this.origin()&&t.origin!==this.origin()||"string"==typeof t.data&&"{"===t.data[0]&&(e=JSON.parse(t.data))&&e.id&&void 0!==e.data&&((e.channel||this.channel())&&this.channel()!==e.channel||this.trigger(e.id,e.data)))},send:function(t,e){e=void 0===e?null:e,this.url()&&this.targetWindow()&&(e={id:t,data:e},this.channel()&&(e.channel=this.channel()),this.targetWindow().postMessage(JSON.stringify(e),this.origin()))}}),a.extend(o.Messenger.prototype,o.Events),o.Notification=o.Class.extend({template:null,templateId:"customize-notification",containerClasses:"",initialize:function(t,e){this.code=t,delete(e=_.extend({message:null,type:"error",fromServer:!1,data:null,setting:null,template:null,dismissible:!1,containerClasses:""},e)).code,_.extend(this,e)},render:function(){var e,t,n=this;return n.template||(n.template=wp.template(n.templateId)),t=_.extend({},n,{alt:n.parent&&n.parent.alt}),e=a(n.template(t)),n.dismissible&&e.find(".notice-dismiss").on("click keydown",function(t){"keydown"===t.type&&13!==t.which||(n.parent?n.parent.remove(n.code):e.remove())}),e}}),(o=a.extend(new o.Values,o)).get=function(){var n={};return this.each(function(t,e){n[e]=t.get()}),n},o.utils={},o.utils.parseQueryString=function(t){var n={};return _.each(t.split("&"),function(t){var e=t.split("=",2);e[0]&&(t=(t=decodeURIComponent(e[0].replace(/\+/g," "))).replace(/ /g,"_"),e=_.isUndefined(e[1])?null:decodeURIComponent(e[1].replace(/\+/g," ")),n[t]=e)}),n},t.customize=o}(wp,jQuery);