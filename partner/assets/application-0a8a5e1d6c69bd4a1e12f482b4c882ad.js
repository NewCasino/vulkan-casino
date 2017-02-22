Date.CultureInfo={name:"en-US",englishName:"English (United States)",nativeName:"English (United States)",dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],abbreviatedDayNames:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],shortestDayNames:["Su","Mo","Tu","We","Th","Fr","Sa"],firstLetterDayNames:["S","M","T","W","T","F","S"],monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],abbreviatedMonthNames:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],amDesignator:"AM",pmDesignator:"PM",firstDayOfWeek:0,twoDigitYearMax:2029,dateElementOrder:"mdy",formatPatterns:{shortDate:"M/d/yyyy",longDate:"dddd, MMMM dd, yyyy",shortTime:"h:mm tt",longTime:"h:mm:ss tt",fullDateTime:"dddd, MMMM dd, yyyy h:mm:ss tt",sortableDateTime:"yyyy-MM-ddTHH:mm:ss",universalSortableDateTime:"yyyy-MM-dd HH:mm:ssZ",rfc1123:"ddd, dd MMM yyyy HH:mm:ss GMT",monthDay:"MMMM dd",yearMonth:"MMMM, yyyy"},regexPatterns:{jan:/^jan(uary)?/i,feb:/^feb(ruary)?/i,mar:/^mar(ch)?/i,apr:/^apr(il)?/i,may:/^may/i,jun:/^jun(e)?/i,jul:/^jul(y)?/i,aug:/^aug(ust)?/i,sep:/^sep(t(ember)?)?/i,oct:/^oct(ober)?/i,nov:/^nov(ember)?/i,dec:/^dec(ember)?/i,sun:/^su(n(day)?)?/i,mon:/^mo(n(day)?)?/i,tue:/^tu(e(s(day)?)?)?/i,wed:/^we(d(nesday)?)?/i,thu:/^th(u(r(s(day)?)?)?)?/i,fri:/^fr(i(day)?)?/i,sat:/^sa(t(urday)?)?/i,future:/^next/i,past:/^last|past|prev(ious)?/i,add:/^(\+|aft(er)?|from|hence)/i,subtract:/^(\-|bef(ore)?|ago)/i,yesterday:/^yes(terday)?/i,today:/^t(od(ay)?)?/i,tomorrow:/^tom(orrow)?/i,now:/^n(ow)?/i,millisecond:/^ms|milli(second)?s?/i,second:/^sec(ond)?s?/i,minute:/^mn|min(ute)?s?/i,hour:/^h(our)?s?/i,week:/^w(eek)?s?/i,month:/^m(onth)?s?/i,day:/^d(ay)?s?/i,year:/^y(ear)?s?/i,shortMeridian:/^(a|p)/i,longMeridian:/^(a\.?m?\.?|p\.?m?\.?)/i,timezone:/^((e(s|d)t|c(s|d)t|m(s|d)t|p(s|d)t)|((gmt)?\s*(\+|\-)\s*\d\d\d\d?)|gmt|utc)/i,ordinalSuffix:/^\s*(st|nd|rd|th)/i,timeContext:/^\s*(\:|a(?!u|p)|p)/i},timezones:[{name:"UTC",offset:"-000"},{name:"GMT",offset:"-000"},{name:"EST",offset:"-0500"},{name:"EDT",offset:"-0400"},{name:"CST",offset:"-0600"},{name:"CDT",offset:"-0500"},{name:"MST",offset:"-0700"},{name:"MDT",offset:"-0600"},{name:"PST",offset:"-0800"},{name:"PDT",offset:"-0700"}]},function(){var t=Date,e=t.prototype,n=t.CultureInfo,a=function(t,e){return e||(e=2),("000"+t).slice(-1*e)};e.clearTime=function(){return this.setHours(0),this.setMinutes(0),this.setSeconds(0),this.setMilliseconds(0),this},e.setTimeToNow=function(){var t=new Date;return this.setHours(t.getHours()),this.setMinutes(t.getMinutes()),this.setSeconds(t.getSeconds()),this.setMilliseconds(t.getMilliseconds()),this},t.today=function(){return(new Date).clearTime()},t.compare=function(t,e){if(isNaN(t)||isNaN(e))throw new Error(t+" - "+e);if(t instanceof Date&&e instanceof Date)return e>t?-1:t>e?1:0;throw new TypeError(t+" - "+e)},t.equals=function(t,e){return 0===t.compareTo(e)},t.getDayNumberFromName=function(t){for(var e=n.dayNames,a=n.abbreviatedDayNames,i=n.shortestDayNames,s=t.toLowerCase(),r=0;r<e.length;r++)if(e[r].toLowerCase()==s||a[r].toLowerCase()==s||i[r].toLowerCase()==s)return r;return-1},t.getMonthNumberFromName=function(t){for(var e=n.monthNames,a=n.abbreviatedMonthNames,i=t.toLowerCase(),s=0;s<e.length;s++)if(e[s].toLowerCase()==i||a[s].toLowerCase()==i)return s;return-1},t.isLeapYear=function(t){return t%4===0&&t%100!==0||t%400===0},t.getDaysInMonth=function(e,n){return[31,t.isLeapYear(e)?29:28,31,30,31,30,31,31,30,31,30,31][n]},t.getTimezoneAbbreviation=function(t){for(var e=n.timezones,a=0;a<e.length;a++)if(e[a].offset===t)return e[a].name;return null},t.getTimezoneOffset=function(t){for(var e=n.timezones,a=0;a<e.length;a++)if(e[a].name===t.toUpperCase())return e[a].offset;return null},e.clone=function(){return new Date(this.getTime())},e.compareTo=function(t){return Date.compare(this,t)},e.equals=function(t){return Date.equals(this,t||new Date)},e.between=function(t,e){return this.getTime()>=t.getTime()&&this.getTime()<=e.getTime()},e.isAfter=function(t){return 1===this.compareTo(t||new Date)},e.isBefore=function(t){return-1===this.compareTo(t||new Date)},e.isToday=function(){return this.isSameDay(new Date)},e.isSameDay=function(t){return this.clone().clearTime().equals(t.clone().clearTime())},e.addMilliseconds=function(t){return this.setMilliseconds(this.getMilliseconds()+t),this},e.addSeconds=function(t){return this.addMilliseconds(1e3*t)},e.addMinutes=function(t){return this.addMilliseconds(6e4*t)},e.addHours=function(t){return this.addMilliseconds(36e5*t)},e.addDays=function(t){return this.setDate(this.getDate()+t),this},e.addWeeks=function(t){return this.addDays(7*t)},e.addMonths=function(e){var n=this.getDate();return this.setDate(1),this.setMonth(this.getMonth()+e),this.setDate(Math.min(n,t.getDaysInMonth(this.getFullYear(),this.getMonth()))),this},e.addYears=function(t){return this.addMonths(12*t)},e.add=function(t){if("number"==typeof t)return this._orient=t,this;var e=t;return e.milliseconds&&this.addMilliseconds(e.milliseconds),e.seconds&&this.addSeconds(e.seconds),e.minutes&&this.addMinutes(e.minutes),e.hours&&this.addHours(e.hours),e.weeks&&this.addWeeks(e.weeks),e.months&&this.addMonths(e.months),e.years&&this.addYears(e.years),e.days&&this.addDays(e.days),this};var i,s,r;e.getWeek=function(){var t,e,n,a,o,h,u,l,d,c;return i=i?i:this.getFullYear(),s=s?s:this.getMonth()+1,r=r?r:this.getDate(),2>=s?(t=i-1,e=(t/4|0)-(t/100|0)+(t/400|0),n=((t-1)/4|0)-((t-1)/100|0)+((t-1)/400|0),d=e-n,o=0,h=r-1+31*(s-1)):(t=i,e=(t/4|0)-(t/100|0)+(t/400|0),n=((t-1)/4|0)-((t-1)/100|0)+((t-1)/400|0),d=e-n,o=d+1,h=r+(153*(s-3)+2)/5+58+d),u=(t+e)%7,a=(h+u-o)%7,l=h+3-a|0,c=0>l?53-((u-d)/5|0):l>364+d?1:(l/7|0)+1,i=s=r=null,c},e.getISOWeek=function(){return i=this.getUTCFullYear(),s=this.getUTCMonth()+1,r=this.getUTCDate(),a(this.getWeek())},e.setWeek=function(t){return this.moveToDayOfWeek(1).addWeeks(t-this.getWeek())},t._validate=function(t,e,n,a){if("undefined"==typeof t)return!1;if("number"!=typeof t)throw new TypeError(t+" is not a Number.");if(e>t||t>n)throw new RangeError(t+" is not a valid value for "+a+".");return!0},t.validateMillisecond=function(e){return t._validate(e,0,999,"millisecond")},t.validateSecond=function(e){return t._validate(e,0,59,"second")},t.validateMinute=function(e){return t._validate(e,0,59,"minute")},t.validateHour=function(e){return t._validate(e,0,23,"hour")},t.validateDay=function(e,n,a){return t._validate(e,1,t.getDaysInMonth(n,a),"day")},t.validateMonth=function(e){return t._validate(e,0,11,"month")},t.validateYear=function(e){return t._validate(e,0,9999,"year")},e.set=function(e){return t.validateMillisecond(e.millisecond)&&this.addMilliseconds(e.millisecond-this.getMilliseconds()),t.validateSecond(e.second)&&this.addSeconds(e.second-this.getSeconds()),t.validateMinute(e.minute)&&this.addMinutes(e.minute-this.getMinutes()),t.validateHour(e.hour)&&this.addHours(e.hour-this.getHours()),t.validateMonth(e.month)&&this.addMonths(e.month-this.getMonth()),t.validateYear(e.year)&&this.addYears(e.year-this.getFullYear()),t.validateDay(e.day,this.getFullYear(),this.getMonth())&&this.addDays(e.day-this.getDate()),e.timezone&&this.setTimezone(e.timezone),e.timezoneOffset&&this.setTimezoneOffset(e.timezoneOffset),e.week&&t._validate(e.week,0,53,"week")&&this.setWeek(e.week),this},e.moveToFirstDayOfMonth=function(){return this.set({day:1})},e.moveToLastDayOfMonth=function(){return this.set({day:t.getDaysInMonth(this.getFullYear(),this.getMonth())})},e.moveToNthOccurrence=function(t,e){var n=0;if(e>0)n=e-1;else if(-1===e)return this.moveToLastDayOfMonth(),this.getDay()!==t&&this.moveToDayOfWeek(t,-1),this;return this.moveToFirstDayOfMonth().addDays(-1).moveToDayOfWeek(t,1).addWeeks(n)},e.moveToDayOfWeek=function(t,e){var n=(t-this.getDay()+7*(e||1))%7;return this.addDays(0===n?n+=7*(e||1):n)},e.moveToMonth=function(t,e){var n=(t-this.getMonth()+12*(e||1))%12;return this.addMonths(0===n?n+=12*(e||1):n)},e.getOrdinalNumber=function(){return Math.ceil((this.clone().clearTime()-new Date(this.getFullYear(),0,1))/864e5)+1},e.getTimezone=function(){return t.getTimezoneAbbreviation(this.getUTCOffset())},e.setTimezoneOffset=function(t){var e=this.getTimezoneOffset(),n=-6*Number(t)/10;return this.addMinutes(n-e)},e.setTimezone=function(e){return this.setTimezoneOffset(t.getTimezoneOffset(e))},e.hasDaylightSavingTime=function(){return Date.today().set({month:0,day:1}).getTimezoneOffset()!==Date.today().set({month:6,day:1}).getTimezoneOffset()},e.isDaylightSavingTime=function(){return this.hasDaylightSavingTime()&&(new Date).getTimezoneOffset()===Date.today().set({month:6,day:1}).getTimezoneOffset()},e.getUTCOffset=function(){var t,e=-10*this.getTimezoneOffset()/6;return 0>e?(t=(e-1e4).toString(),t.charAt(0)+t.substr(2)):(t=(e+1e4).toString(),"+"+t.substr(1))},e.getElapsed=function(t){return(t||new Date)-this},e.toISOString||(e.toISOString=function(){function t(t){return 10>t?"0"+t:t}return'"'+this.getUTCFullYear()+"-"+t(this.getUTCMonth()+1)+"-"+t(this.getUTCDate())+"T"+t(this.getUTCHours())+":"+t(this.getUTCMinutes())+":"+t(this.getUTCSeconds())+'Z"'}),e._toString=e.toString,e.toString=function(t){var e=this;if(t&&1==t.length){var i=n.formatPatterns;switch(e.t=e.toString,t){case"d":return e.t(i.shortDate);case"D":return e.t(i.longDate);case"F":return e.t(i.fullDateTime);case"m":return e.t(i.monthDay);case"r":return e.t(i.rfc1123);case"s":return e.t(i.sortableDateTime);case"t":return e.t(i.shortTime);case"T":return e.t(i.longTime);case"u":return e.t(i.universalSortableDateTime);case"y":return e.t(i.yearMonth)}}var s=function(t){switch(1*t){case 1:case 21:case 31:return"st";case 2:case 22:return"nd";case 3:case 23:return"rd";default:return"th"}};return t?t.replace(/(\\)?(dd?d?d?|MM?M?M?|yy?y?y?|hh?|HH?|mm?|ss?|tt?|S)/g,function(t){if("\\"===t.charAt(0))return t.replace("\\","");switch(e.h=e.getHours,t){case"hh":return a(e.h()<13?0===e.h()?12:e.h():e.h()-12);case"h":return e.h()<13?0===e.h()?12:e.h():e.h()-12;case"HH":return a(e.h());case"H":return e.h();case"mm":return a(e.getMinutes());case"m":return e.getMinutes();case"ss":return a(e.getSeconds());case"s":return e.getSeconds();case"yyyy":return a(e.getFullYear(),4);case"yy":return a(e.getFullYear());case"dddd":return n.dayNames[e.getDay()];case"ddd":return n.abbreviatedDayNames[e.getDay()];case"dd":return a(e.getDate());case"d":return e.getDate();case"MMMM":return n.monthNames[e.getMonth()];case"MMM":return n.abbreviatedMonthNames[e.getMonth()];case"MM":return a(e.getMonth()+1);case"M":return e.getMonth()+1;case"t":return e.h()<12?n.amDesignator.substring(0,1):n.pmDesignator.substring(0,1);case"tt":return e.h()<12?n.amDesignator:n.pmDesignator;case"S":return s(e.getDate());default:return t}}):this._toString()}}(),function(){var t=Date,e=t.prototype,n=t.CultureInfo,a=Number.prototype;e._orient=1,e._nth=null,e._is=!1,e._same=!1,e._isSecond=!1,a._dateElement="day",e.next=function(){return this._orient=1,this},t.next=function(){return t.today().next()},e.last=e.prev=e.previous=function(){return this._orient=-1,this},t.last=t.prev=t.previous=function(){return t.today().last()},e.is=function(){return this._is=!0,this},e.same=function(){return this._same=!0,this._isSecond=!1,this},e.today=function(){return this.same().day()},e.weekday=function(){return this._is?(this._is=!1,!this.is().sat()&&!this.is().sun()):!1},e.at=function(e){return"string"==typeof e?t.parse(this.toString("d")+" "+e):this.set(e)},a.fromNow=a.after=function(t){var e={};return e[this._dateElement]=this,(t?t.clone():new Date).add(e)},a.ago=a.before=function(t){var e={};return e[this._dateElement]=-1*this,(t?t.clone():new Date).add(e)};var i,s="sunday monday tuesday wednesday thursday friday saturday".split(/\s/),r="january february march april may june july august september october november december".split(/\s/),o="Millisecond Second Minute Hour Day Week Month Year".split(/\s/),h="Milliseconds Seconds Minutes Hours Date Week Month FullYear".split(/\s/),u="final first second third fourth fifth".split(/\s/);e.toObject=function(){for(var t={},e=0;e<o.length;e++)t[o[e].toLowerCase()]=this["get"+h[e]]();return t},t.fromObject=function(t){return t.week=null,Date.today().set(t)};for(var l=function(e){return function(){if(this._is)return this._is=!1,this.getDay()==e;if(null!==this._nth){this._isSecond&&this.addSeconds(-1*this._orient),this._isSecond=!1;var n=this._nth;this._nth=null;var a=this.clone().moveToLastDayOfMonth();if(this.moveToNthOccurrence(e,n),this>a)throw new RangeError(t.getDayName(e)+" does not occur "+n+" times in the month of "+t.getMonthName(a.getMonth())+" "+a.getFullYear()+".");return this}return this.moveToDayOfWeek(e,this._orient)}},d=function(e){return function(){var a=t.today(),i=e-a.getDay();return 0===e&&1===n.firstDayOfWeek&&0!==a.getDay()&&(i+=7),a.addDays(i)}},c=0;c<s.length;c++)t[s[c].toUpperCase()]=t[s[c].toUpperCase().substring(0,3)]=c,t[s[c]]=t[s[c].substring(0,3)]=d(c),e[s[c]]=e[s[c].substring(0,3)]=l(c);for(var f=function(t){return function(){return this._is?(this._is=!1,this.getMonth()===t):this.moveToMonth(t,this._orient)}},m=function(e){return function(){return t.today().set({month:e,day:1})}},y=0;y<r.length;y++)t[r[y].toUpperCase()]=t[r[y].toUpperCase().substring(0,3)]=y,t[r[y]]=t[r[y].substring(0,3)]=m(y),e[r[y]]=e[r[y].substring(0,3)]=f(y);for(var g=function(t){return function(){if(this._isSecond)return this._isSecond=!1,this;if(this._same){this._same=this._is=!1;for(var e=this.toObject(),n=(arguments[0]||new Date).toObject(),a="",i=t.toLowerCase(),s=o.length-1;s>-1;s--){if(a=o[s].toLowerCase(),e[a]!=n[a])return!1;if(i==a)break}return!0}return"s"!=t.substring(t.length-1)&&(t+="s"),this["add"+t](this._orient)}},p=function(t){return function(){return this._dateElement=t,this}},D=0;D<o.length;D++)i=o[D].toLowerCase(),e[i]=e[i+"s"]=g(o[D]),a[i]=a[i+"s"]=p(i);e._ss=g("Second");for(var v=function(t){return function(e){return this._same?this._ss(arguments[0]):e||0===e?this.moveToNthOccurrence(e,t):(this._nth=t,2!==t||void 0!==e&&null!==e?this:(this._isSecond=!0,this.addSeconds(this._orient)))}},M=0;M<u.length;M++)e[u[M]]=v(0===M?-1:M)}(),function(){Date.Parsing={Exception:function(t){this.message="Parse error at '"+t.substring(0,10)+" ...'"}};for(var t=Date.Parsing,e=t.Operators={rtoken:function(e){return function(n){var a=n.match(e);if(a)return[a[0],n.substring(a[0].length)];throw new t.Exception(n)}},token:function(){return function(t){return e.rtoken(new RegExp("^s*"+t+"s*"))(t)}},stoken:function(t){return e.rtoken(new RegExp("^"+t))},until:function(t){return function(e){for(var n=[],a=null;e.length;){try{a=t.call(this,e)}catch(i){n.push(a[0]),e=a[1];continue}break}return[n,e]}},many:function(t){return function(e){for(var n=[],a=null;e.length;){try{a=t.call(this,e)}catch(i){return[n,e]}n.push(a[0]),e=a[1]}return[n,e]}},optional:function(t){return function(e){var n=null;try{n=t.call(this,e)}catch(a){return[null,e]}return[n[0],n[1]]}},not:function(e){return function(n){try{e.call(this,n)}catch(a){return[null,n]}throw new t.Exception(n)}},ignore:function(t){return t?function(e){var n=null;return n=t.call(this,e),[null,n[1]]}:null},product:function(){for(var t=arguments[0],n=Array.prototype.slice.call(arguments,1),a=[],i=0;i<t.length;i++)a.push(e.each(t[i],n));return a},cache:function(e){var n={},a=null;return function(i){try{a=n[i]=n[i]||e.call(this,i)}catch(s){a=n[i]=s}if(a instanceof t.Exception)throw a;return a}},any:function(){var e=arguments;return function(n){for(var a=null,i=0;i<e.length;i++)if(null!=e[i]){try{a=e[i].call(this,n)}catch(s){a=null}if(a)return a}throw new t.Exception(n)}},each:function(){var e=arguments;return function(n){for(var a=[],i=null,s=0;s<e.length;s++)if(null!=e[s]){try{i=e[s].call(this,n)}catch(r){throw new t.Exception(n)}a.push(i[0]),n=i[1]}return[a,n]}},all:function(){var t=arguments,e=e;return e.each(e.optional(t))},sequence:function(n,a,i){return a=a||e.rtoken(/^\s*/),i=i||null,1==n.length?n[0]:function(e){for(var s=null,r=null,o=[],h=0;h<n.length;h++){try{s=n[h].call(this,e)}catch(u){break}o.push(s[0]);try{r=a.call(this,s[1])}catch(l){r=null;break}e=r[1]}if(!s)throw new t.Exception(e);if(r)throw new t.Exception(r[1]);if(i)try{s=i.call(this,s[1])}catch(d){throw new t.Exception(s[1])}return[o,s?s[1]:e]}},between:function(t,n,a){a=a||t;var i=e.each(e.ignore(t),n,e.ignore(a));return function(t){var e=i.call(this,t);return[[e[0][0],r[0][2]],e[1]]}},list:function(t,n,a){return n=n||e.rtoken(/^\s*/),a=a||null,t instanceof Array?e.each(e.product(t.slice(0,-1),e.ignore(n)),t.slice(-1),e.ignore(a)):e.each(e.many(e.each(t,e.ignore(n))),px,e.ignore(a))},set:function(n,a,i){return a=a||e.rtoken(/^\s*/),i=i||null,function(s){for(var r=null,o=null,h=null,u=null,l=[[],s],d=!1,c=0;c<n.length;c++){h=null,o=null,r=null,d=1==n.length;try{r=n[c].call(this,s)}catch(f){continue}if(u=[[r[0]],r[1]],r[1].length>0&&!d)try{h=a.call(this,r[1])}catch(m){d=!0}else d=!0;if(d||0!==h[1].length||(d=!0),!d){for(var y=[],g=0;g<n.length;g++)c!=g&&y.push(n[g]);o=e.set(y,a).call(this,h[1]),o[0].length>0&&(u[0]=u[0].concat(o[0]),u[1]=o[1])}if(u[1].length<l[1].length&&(l=u),0===l[1].length)break}if(0===l[0].length)return l;if(i){try{h=i.call(this,l[1])}catch(p){throw new t.Exception(l[1])}l[1]=h[1]}return l}},forward:function(t,e){return function(n){return t[e].call(this,n)}},replace:function(t,e){return function(n){var a=t.call(this,n);return[e,a[1]]}},process:function(t,e){return function(n){var a=t.call(this,n);return[e.call(this,a[0]),a[1]]}},min:function(e,n){return function(a){var i=n.call(this,a);if(i[0].length<e)throw new t.Exception(a);return i}}},n=function(t){return function(){var e=null,n=[];if(arguments.length>1?e=Array.prototype.slice.call(arguments):arguments[0]instanceof Array&&(e=arguments[0]),!e)return t.apply(null,arguments);for(var a=0,i=e.shift();a<i.length;a++)return e.unshift(i[a]),n.push(t.apply(null,e)),e.shift(),n}},a="optional not ignore cache".split(/\s/),i=0;i<a.length;i++)e[a[i]]=n(e[a[i]]);for(var s=function(t){return function(){return arguments[0]instanceof Array?t.apply(null,arguments[0]):t.apply(null,arguments)}},o="each any all".split(/\s/),h=0;h<o.length;h++)e[o[h]]=s(e[o[h]])}(),function(){var t=Date,e=(t.prototype,t.CultureInfo),n=function(t){for(var e=[],a=0;a<t.length;a++)t[a]instanceof Array?e=e.concat(n(t[a])):t[a]&&e.push(t[a]);return e};t.Grammar={},t.Translator={hour:function(t){return function(){this.hour=Number(t)}},minute:function(t){return function(){this.minute=Number(t)}},second:function(t){return function(){this.second=Number(t)}},meridian:function(t){return function(){this.meridian=t.slice(0,1).toLowerCase()}},timezone:function(t){return function(){var e=t.replace(/[^\d\+\-]/g,"");e.length?this.timezoneOffset=Number(e):this.timezone=t.toLowerCase()}},day:function(t){var e=t[0];return function(){this.day=Number(e.match(/\d+/)[0])}},month:function(t){return function(){this.month=3==t.length?"jan feb mar apr may jun jul aug sep oct nov dec".indexOf(t)/4:Number(t)-1}},year:function(t){return function(){var n=Number(t);this.year=t.length>2?n:n+(n+2e3<e.twoDigitYearMax?2e3:1900)}},rday:function(t){return function(){switch(t){case"yesterday":this.days=-1;break;case"tomorrow":this.days=1;break;case"today":this.days=0;break;case"now":this.days=0,this.now=!0}}},finishExact:function(e){e=e instanceof Array?e:[e];for(var n=0;n<e.length;n++)e[n]&&e[n].call(this);var a=new Date;if(!this.hour&&!this.minute||this.month||this.year||this.day||(this.day=a.getDate()),this.year||(this.year=a.getFullYear()),this.month||0===this.month||(this.month=a.getMonth()),this.day||(this.day=1),this.hour||(this.hour=0),this.minute||(this.minute=0),this.second||(this.second=0),this.meridian&&this.hour&&("p"==this.meridian&&this.hour<12?this.hour=this.hour+12:"a"==this.meridian&&12==this.hour&&(this.hour=0)),this.day>t.getDaysInMonth(this.year,this.month))throw new RangeError(this.day+" is not a valid value for days.");var i=new Date(this.year,this.month,this.day,this.hour,this.minute,this.second);return this.timezone?i.set({timezone:this.timezone}):this.timezoneOffset&&i.set({timezoneOffset:this.timezoneOffset}),i},finish:function(e){if(e=e instanceof Array?n(e):[e],0===e.length)return null;for(var a=0;a<e.length;a++)"function"==typeof e[a]&&e[a].call(this);var i=t.today();if(this.now&&!this.unit&&!this.operator)return new Date;this.now&&(i=new Date);var s,r,o,h=!!(this.days&&null!==this.days||this.orient||this.operator);if(o="past"==this.orient||"subtract"==this.operator?-1:1,this.now||-1=="hour minute second".indexOf(this.unit)||i.setTimeToNow(),(this.month||0===this.month)&&-1!="year day hour minute second".indexOf(this.unit)&&(this.value=this.month+1,this.month=null,h=!0),!h&&this.weekday&&!this.day&&!this.days){var u=Date[this.weekday]();this.day=u.getDate(),this.month||(this.month=u.getMonth()),this.year=u.getFullYear()}if(h&&this.weekday&&"month"!=this.unit&&(this.unit="day",s=t.getDayNumberFromName(this.weekday)-i.getDay(),r=7,this.days=s?(s+o*r)%r:o*r),this.month&&"day"==this.unit&&this.operator&&(this.value=this.month+1,this.month=null),null!=this.value&&null!=this.month&&null!=this.year&&(this.day=1*this.value),this.month&&!this.day&&this.value&&(i.set({day:1*this.value}),h||(this.day=1*this.value)),this.month||!this.value||"month"!=this.unit||this.now||(this.month=this.value,h=!0),h&&(this.month||0===this.month)&&"year"!=this.unit&&(this.unit="month",s=this.month-i.getMonth(),r=12,this.months=s?(s+o*r)%r:o*r,this.month=null),this.unit||(this.unit="day"),!this.value&&this.operator&&null!==this.operator&&this[this.unit+"s"]&&null!==this[this.unit+"s"]?this[this.unit+"s"]=this[this.unit+"s"]+("add"==this.operator?1:-1)+(this.value||0)*o:(null==this[this.unit+"s"]||null!=this.operator)&&(this.value||(this.value=1),this[this.unit+"s"]=this.value*o),this.meridian&&this.hour&&("p"==this.meridian&&this.hour<12?this.hour=this.hour+12:"a"==this.meridian&&12==this.hour&&(this.hour=0)),this.weekday&&!this.day&&!this.days){var u=Date[this.weekday]();this.day=u.getDate(),u.getMonth()!==i.getMonth()&&(this.month=u.getMonth())}return!this.month&&0!==this.month||this.day||(this.day=1),this.orient||this.operator||"week"!=this.unit||!this.value||this.day||this.month?(h&&this.timezone&&this.day&&this.days&&(this.day=this.days),h?i.add(this):i.set(this)):Date.today().setWeek(this.value)}};var a,i=t.Parsing.Operators,s=t.Grammar,r=t.Translator;s.datePartDelimiter=i.rtoken(/^([\s\-\.\,\/\x27]+)/),s.timePartDelimiter=i.stoken(":"),s.whiteSpace=i.rtoken(/^\s*/),s.generalDelimiter=i.rtoken(/^(([\s\,]|at|@|on)+)/);var o={};s.ctoken=function(t){var n=o[t];if(!n){for(var a=e.regexPatterns,s=t.split(/\s+/),r=[],h=0;h<s.length;h++)r.push(i.replace(i.rtoken(a[s[h]]),s[h]));n=o[t]=i.any.apply(null,r)}return n},s.ctoken2=function(t){return i.rtoken(e.regexPatterns[t])},s.h=i.cache(i.process(i.rtoken(/^(0[0-9]|1[0-2]|[1-9])/),r.hour)),s.hh=i.cache(i.process(i.rtoken(/^(0[0-9]|1[0-2])/),r.hour)),s.H=i.cache(i.process(i.rtoken(/^([0-1][0-9]|2[0-3]|[0-9])/),r.hour)),s.HH=i.cache(i.process(i.rtoken(/^([0-1][0-9]|2[0-3])/),r.hour)),s.m=i.cache(i.process(i.rtoken(/^([0-5][0-9]|[0-9])/),r.minute)),s.mm=i.cache(i.process(i.rtoken(/^[0-5][0-9]/),r.minute)),s.s=i.cache(i.process(i.rtoken(/^([0-5][0-9]|[0-9])/),r.second)),s.ss=i.cache(i.process(i.rtoken(/^[0-5][0-9]/),r.second)),s.hms=i.cache(i.sequence([s.H,s.m,s.s],s.timePartDelimiter)),s.t=i.cache(i.process(s.ctoken2("shortMeridian"),r.meridian)),s.tt=i.cache(i.process(s.ctoken2("longMeridian"),r.meridian)),s.z=i.cache(i.process(i.rtoken(/^((\+|\-)\s*\d\d\d\d)|((\+|\-)\d\d\:?\d\d)/),r.timezone)),s.zz=i.cache(i.process(i.rtoken(/^((\+|\-)\s*\d\d\d\d)|((\+|\-)\d\d\:?\d\d)/),r.timezone)),s.zzz=i.cache(i.process(s.ctoken2("timezone"),r.timezone)),s.timeSuffix=i.each(i.ignore(s.whiteSpace),i.set([s.tt,s.zzz])),s.time=i.each(i.optional(i.ignore(i.stoken("T"))),s.hms,s.timeSuffix),s.d=i.cache(i.process(i.each(i.rtoken(/^([0-2]\d|3[0-1]|\d)/),i.optional(s.ctoken2("ordinalSuffix"))),r.day)),s.dd=i.cache(i.process(i.each(i.rtoken(/^([0-2]\d|3[0-1])/),i.optional(s.ctoken2("ordinalSuffix"))),r.day)),s.ddd=s.dddd=i.cache(i.process(s.ctoken("sun mon tue wed thu fri sat"),function(t){return function(){this.weekday=t}})),s.M=i.cache(i.process(i.rtoken(/^(1[0-2]|0\d|\d)/),r.month)),s.MM=i.cache(i.process(i.rtoken(/^(1[0-2]|0\d)/),r.month)),s.MMM=s.MMMM=i.cache(i.process(s.ctoken("jan feb mar apr may jun jul aug sep oct nov dec"),r.month)),s.y=i.cache(i.process(i.rtoken(/^(\d\d?)/),r.year)),s.yy=i.cache(i.process(i.rtoken(/^(\d\d)/),r.year)),s.yyy=i.cache(i.process(i.rtoken(/^(\d\d?\d?\d?)/),r.year)),s.yyyy=i.cache(i.process(i.rtoken(/^(\d\d\d\d)/),r.year)),a=function(){return i.each(i.any.apply(null,arguments),i.not(s.ctoken2("timeContext")))},s.day=a(s.d,s.dd),s.month=a(s.M,s.MMM),s.year=a(s.yyyy,s.yy),s.orientation=i.process(s.ctoken("past future"),function(t){return function(){this.orient=t}}),s.operator=i.process(s.ctoken("add subtract"),function(t){return function(){this.operator=t}}),s.rday=i.process(s.ctoken("yesterday tomorrow today now"),r.rday),s.unit=i.process(s.ctoken("second minute hour day week month year"),function(t){return function(){this.unit=t}}),s.value=i.process(i.rtoken(/^\d\d?(st|nd|rd|th)?/),function(t){return function(){this.value=t.replace(/\D/g,"")}}),s.expression=i.set([s.rday,s.operator,s.value,s.unit,s.orientation,s.ddd,s.MMM]),a=function(){return i.set(arguments,s.datePartDelimiter)},s.mdy=a(s.ddd,s.month,s.day,s.year),s.ymd=a(s.ddd,s.year,s.month,s.day),s.dmy=a(s.ddd,s.day,s.month,s.year),s.date=function(t){return(s[e.dateElementOrder]||s.mdy).call(this,t)},s.format=i.process(i.many(i.any(i.process(i.rtoken(/^(dd?d?d?|MM?M?M?|yy?y?y?|hh?|HH?|mm?|ss?|tt?|zz?z?)/),function(e){if(s[e])return s[e];throw t.Parsing.Exception(e)}),i.process(i.rtoken(/^[^dMyhHmstz]+/),function(t){return i.ignore(i.stoken(t))}))),function(t){return i.process(i.each.apply(null,t),r.finishExact)});var h={},u=function(t){return h[t]=h[t]||s.format(t)[0]};s.formats=function(t){if(t instanceof Array){for(var e=[],n=0;n<t.length;n++)e.push(u(t[n]));return i.any.apply(null,e)}return u(t)},s._formats=s.formats(['"yyyy-MM-ddTHH:mm:ssZ"',"yyyy-MM-ddTHH:mm:ssZ","yyyy-MM-ddTHH:mm:ssz","yyyy-MM-ddTHH:mm:ss","yyyy-MM-ddTHH:mmZ","yyyy-MM-ddTHH:mmz","yyyy-MM-ddTHH:mm","ddd, MMM dd, yyyy H:mm:ss tt","ddd MMM d yyyy HH:mm:ss zzz","MMddyyyy","ddMMyyyy","Mddyyyy","ddMyyyy","Mdyyyy","dMyyyy","yyyy","Mdyy","dMyy","d"]),s._start=i.process(i.set([s.date,s.time,s.expression],s.generalDelimiter,s.whiteSpace),r.finish),s.start=function(t){try{var e=s._formats.call({},t);if(0===e[1].length)return e}catch(n){}return s._start.call({},t)},t._parse=t.parse,t.parse=function(e){var n=null;if(!e)return null;if(e instanceof Date)return e;try{n=t.Grammar.start.call({},e.replace(/^\s*(\S*(\s+\S+)*)\s*$/,"$1"))}catch(a){return null}return 0===n[1].length?n[0]:null},t.getParseFunction=function(e){var n=t.Grammar.formats(e);return function(t){var e=null;try{e=n.call({},t)}catch(a){return null}return 0===e[1].length?e[0]:null}},t.parseExact=function(e,n){return t.getParseFunction(n)(e)}}(),function(){$(function(){return $(".clock").each(function(){var t,e,n;return e=$(this),n=e.attr("data-timestamp"),t=new Date(e.attr("data-time")),t.getTimezoneOffset()%240===0?setInterval(function(){return e.html((new Date).toUTCString().match(/\d{2}:\d{2}:\d{2}/))},1e3):void 0})})}.call(this),!function(t){var e=function(e,n,a){var i,s="object"==typeof n;this.startDate=Date.today(),this.endDate=Date.today(),this.minDate=!1,this.maxDate=!1,this.changed=!1,this.ranges={},this.opens="right",this.cb=function(){},this.format="MM/dd/yyyy",this.separator=" - ",this.showWeekNumbers=!1,this.buttonClasses=["btn-success"],this.locale={applyLabel:"Apply",fromLabel:"From",toLabel:"To",weekLabel:"W",customRangeLabel:"Custom Range",daysOfWeek:Date.CultureInfo.shortestDayNames,monthNames:Date.CultureInfo.monthNames,firstDay:0},i=this.locale,this.leftCalendar={month:Date.today().set({day:1,month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),calendar:Array()},this.rightCalendar={month:Date.today().set({day:1,month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),calendar:Array()},this.parentEl="body",this.element=t(e),this.element.hasClass("pull-right")&&(this.opens="left"),this.element.is("input")?this.element.on({click:t.proxy(this.show,this),focus:t.proxy(this.show,this)}):this.element.on("click",t.proxy(this.show,this)),s&&"object"==typeof n.locale&&t.each(i,function(t,e){i[t]=n.locale[t]||e});var r='<div class="daterangepicker dropdown-menu"><div class="calendar left"></div><div class="calendar right"></div><div class="ranges"><div class="range_inputs"><div><label for="daterangepicker_start">'+this.locale.fromLabel+'</label><input class="m-wrap input-mini" type="text" name="daterangepicker_start" value="" disabled="disabled" /></div><div><label for="daterangepicker_end">'+this.locale.toLabel+'</label><input class="m-wrap input-mini" type="text" name="daterangepicker_end" value="" disabled="disabled" /></div><button class="btn " disabled="disabled">'+this.locale.applyLabel+"</button></div></div></div>";if(this.parentEl=s&&n.parentEl&&t(n.parentEl)||t(this.parentEl),this.container=t(r).appendTo(this.parentEl),s){if("string"==typeof n.format&&(this.format=n.format),"string"==typeof n.separator&&(this.separator=n.separator),"string"==typeof n.startDate&&(this.startDate=Date.parse(n.startDate,this.format)),"string"==typeof n.endDate&&(this.endDate=Date.parse(n.endDate,this.format)),"string"==typeof n.minDate&&(this.minDate=Date.parse(n.minDate,this.format)),"string"==typeof n.maxDate&&(this.maxDate=Date.parse(n.maxDate,this.format)),"object"==typeof n.startDate&&(this.startDate=n.startDate),"object"==typeof n.endDate&&(this.endDate=n.endDate),"object"==typeof n.minDate&&(this.minDate=n.minDate),"object"==typeof n.maxDate&&(this.maxDate=n.maxDate),"object"==typeof n.ranges){for(var o in n.ranges){var h=n.ranges[o][0],u=n.ranges[o][1];"string"==typeof h&&(h=Date.parse(h)),"string"==typeof u&&(u=Date.parse(u)),this.minDate&&h<this.minDate&&(h=this.minDate),this.maxDate&&u>this.maxDate&&(u=this.maxDate),this.minDate&&u<this.minDate||this.maxDate&&h>this.maxDate||(this.ranges[o]=[h,u])}var l="<ul>";for(var o in this.ranges)l+="<li>"+o+"</li>";l+="<li>"+this.locale.customRangeLabel+"</li>",l+="</ul>",this.container.find(".ranges").prepend(l)}if("object"==typeof n.locale&&"number"==typeof n.locale.firstDay){this.locale.firstDay=n.locale.firstDay;for(var d=n.locale.firstDay;d>0;)this.locale.daysOfWeek.push(this.locale.daysOfWeek.shift()),d--}"string"==typeof n.opens&&(this.opens=n.opens),"boolean"==typeof n.showWeekNumbers&&(this.showWeekNumbers=n.showWeekNumbers),"string"==typeof n.buttonClasses&&(this.buttonClasses=[n.buttonClasses]),"object"==typeof n.buttonClasses&&(this.buttonClasses=n.buttonClasses)}var c=this.container;if(t.each(this.buttonClasses,function(t,e){c.find("button").addClass(e)}),"right"==this.opens){var f=this.container.find(".calendar.left"),m=this.container.find(".calendar.right");f.removeClass("left").addClass("right"),m.removeClass("right").addClass("left")}("undefined"==typeof n||"undefined"==typeof n.ranges)&&this.container.find(".calendar").show(),"function"==typeof a&&(this.cb=a),this.container.addClass("opens"+this.opens),this.container.on("mousedown",t.proxy(this.mousedown,this)),this.container.find(".calendar").on("click",".prev",t.proxy(this.clickPrev,this)),this.container.find(".calendar").on("click",".next",t.proxy(this.clickNext,this)),this.container.find(".ranges").on("click","button",t.proxy(this.clickApply,this)),this.container.find(".calendar").on("click","td.available",t.proxy(this.clickDate,this)),this.container.find(".calendar").on("mouseenter","td.available",t.proxy(this.enterDate,this)),this.container.find(".calendar").on("mouseleave","td.available",t.proxy(this.updateView,this)),this.container.find(".ranges").on("click","li",t.proxy(this.clickRange,this)),this.container.find(".ranges").on("mouseenter","li",t.proxy(this.enterRange,this)),this.container.find(".ranges").on("mouseleave","li",t.proxy(this.updateView,this)),this.element.on("keyup",t.proxy(this.updateFromControl,this)),this.updateView(),this.updateCalendars()};e.prototype={constructor:e,mousedown:function(t){t.stopPropagation(),t.preventDefault()},updateView:function(){this.leftCalendar.month.set({month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),this.rightCalendar.month.set({month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),this.container.find("input[name=daterangepicker_start]").val(this.startDate.toString(this.format)),this.container.find("input[name=daterangepicker_end]").val(this.endDate.toString(this.format)),this.startDate.equals(this.endDate)||this.startDate.isBefore(this.endDate)?this.container.find("button").removeAttr("disabled"):this.container.find("button").attr("disabled","disabled")
},updateFromControl:function(){if(this.element.is("input")){var t=this.element.val().split(this.separator),e=Date.parseExact(t[0],this.format),n=Date.parseExact(t[1],this.format);null!=e&&null!=n&&(n.isBefore(e)||(this.startDate=e,this.endDate=n,this.updateView(),this.cb(this.startDate,this.endDate),this.updateCalendars()))}},notify:function(){this.updateView(),this.element.is("input")&&this.element.val(this.startDate.toString(this.format)+this.separator+this.endDate.toString(this.format)),this.cb(this.startDate,this.endDate)},move:function(){var e={top:this.parentEl.offset().top-this.parentEl.scrollTop(),left:this.parentEl.offset().left-this.parentEl.scrollLeft()};this.container.css("left"==this.opens?{top:this.element.offset().top+this.element.outerHeight(),right:t(window).width()-this.element.offset().left-this.element.outerWidth()-e.left,left:"auto"}:{top:this.element.offset().top+this.element.outerHeight(),left:this.element.offset().left-e.left,right:"auto"})},show:function(e){this.container.show(),this.move(),e&&(e.stopPropagation(),e.preventDefault()),this.changed=!1,t(document).on("mousedown",t.proxy(this.hide,this))},hide:function(){this.container.hide(),t(document).off("mousedown",this.hide),this.changed&&(this.changed=!1,this.notify())},enterRange:function(t){var e=t.target.innerHTML;if(e==this.locale.customRangeLabel)this.updateView();else{var n=this.ranges[e];this.container.find("input[name=daterangepicker_start]").val(n[0].toString(this.format)),this.container.find("input[name=daterangepicker_end]").val(n[1].toString(this.format))}},clickRange:function(t){var e=t.target.innerHTML;if(e==this.locale.customRangeLabel)this.container.find(".calendar").show();else{var n=this.ranges[e];this.startDate=n[0],this.endDate=n[1],this.leftCalendar.month.set({month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),this.rightCalendar.month.set({month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),this.updateCalendars(),this.changed=!0,this.container.find(".calendar").hide(),this.hide()}},clickPrev:function(e){var n=t(e.target).parents(".calendar");n.hasClass("left")?this.leftCalendar.month.add({months:-1}):this.rightCalendar.month.add({months:-1}),this.updateCalendars()},clickNext:function(e){var n=t(e.target).parents(".calendar");n.hasClass("left")?this.leftCalendar.month.add({months:1}):this.rightCalendar.month.add({months:1}),this.updateCalendars()},enterDate:function(e){var n=t(e.target).attr("title"),a=n.substr(1,1),i=n.substr(3,1),s=t(e.target).parents(".calendar");s.hasClass("left")?this.container.find("input[name=daterangepicker_start]").val(this.leftCalendar.calendar[a][i].toString(this.format)):this.container.find("input[name=daterangepicker_end]").val(this.rightCalendar.calendar[a][i].toString(this.format))},clickDate:function(e){var n=t(e.target).attr("title"),a=n.substr(1,1),i=n.substr(3,1),s=t(e.target).parents(".calendar");s.hasClass("left")?(startDate=this.leftCalendar.calendar[a][i],endDate=this.endDate):(startDate=this.startDate,endDate=this.rightCalendar.calendar[a][i]),s.find("td").removeClass("active"),(startDate.equals(endDate)||startDate.isBefore(endDate))&&(t(e.target).addClass("active"),startDate.equals(this.startDate)&&endDate.equals(this.endDate)||(this.changed=!0),this.startDate=startDate,this.endDate=endDate),this.leftCalendar.month.set({month:this.startDate.getMonth(),year:this.startDate.getFullYear()}),this.rightCalendar.month.set({month:this.endDate.getMonth(),year:this.endDate.getFullYear()}),this.updateCalendars()},clickApply:function(){this.hide()},updateCalendars:function(){this.leftCalendar.calendar=this.buildCalendar(this.leftCalendar.month.getMonth(),this.leftCalendar.month.getFullYear()),this.rightCalendar.calendar=this.buildCalendar(this.rightCalendar.month.getMonth(),this.rightCalendar.month.getFullYear()),this.container.find(".calendar.left").html(this.renderCalendar(this.leftCalendar.calendar,this.startDate,this.minDate,this.endDate)),this.container.find(".calendar.right").html(this.renderCalendar(this.rightCalendar.calendar,this.endDate,this.startDate,this.maxDate))},buildCalendar:function(t,e){for(var n=Date.today().set({day:1,month:t,year:e}),a=n.clone().add(-1).day().getMonth(),i=n.clone().add(-1).day().getFullYear(),s=(Date.getDaysInMonth(e,t),Date.getDaysInMonth(i,a)),r=n.getDay(),o=Array(),h=0;6>h;h++)o[h]=Array();var u=s-r+this.locale.firstDay+1;u>s&&(u-=7),r==this.locale.firstDay&&(u=s-6);for(var l=Date.today().set({day:u,month:a,year:i}),h=0,d=0,c=0;42>h;h++,d++,l=l.clone().add(1).day())h>0&&d%7==0&&(d=0,c++),o[c][d]=l;return o},renderCalendar:function(e,n,a,i){var s='<table class="table-condensed">';s+="<thead>",s+="<tr>",this.showWeekNumbers&&(s+="<th></th>"),s+=!a||a<e[1][1]?'<th class="prev available"><i class="icon-angle-left"></i></th>':"<th></th>",s+='<th colspan="5" style="width: auto">'+this.locale.monthNames[e[1][1].getMonth()]+e[1][1].toString(" yyyy")+"</th>",s+=!i||i>e[1][1]?'<th class="next available"><i class="icon-angle-right"></i></th>':"<th></th>",s+="</tr>",s+="<tr>",this.showWeekNumbers&&(s+='<th class="week">'+this.locale.weekLabel+"</th>"),t.each(this.locale.daysOfWeek,function(t,e){s+="<th>"+e+"</th>"}),s+="</tr>",s+="</thead>",s+="<tbody>";for(var r=0;6>r;r++){s+="<tr>",this.showWeekNumbers&&(s+='<td class="week">'+e[r][0].getWeek()+"</td>");for(var o=0;7>o;o++){var h="available ";h+=e[r][o].getMonth()==e[1][1].getMonth()?"":"off",n.setHours(0,0,0,0),a&&e[r][o]<a||i&&e[r][o]>i?h="off disabled":e[r][o].equals(n)&&(h+="active");var u="r"+r+"c"+o;s+='<td class="'+h+'" title="'+u+'">'+e[r][o].getDate()+"</td>"}s+="</tr>"}return s+="</tbody>",s+="</table>"}},t.fn.daterangepicker=function(n,a){return this.each(function(){var i=t(this);i.data("daterangepicker")||i.data("daterangepicker",new e(i,n,a))}),this}}(window.jQuery);