/*!
 Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
 */
var CKFinder = function () {
    function __internalInit(e) {
        return e = e || {}, e['demoMessage'] = 'This is a demo version of CKFinder 3', e['hello'] = 'Hello fellow cracker! We are really sad that you are trying to crack our application - we put lots of effort to create it. ' + 'Would you like to get a free CKFinder license? Feel free to submit your translation! http://docs.cksource.com/ckfinder3/#!/guide/dev_translations', e['isDemo'] = !0, e;
    }
    function internalCKFinderInit(e, t, n) {
        var i = t.getElementsByTagName('head')[0], r = t.createElement('script');
        r[r.innerText ? 'innerText' : 'innerHTML'] = n + '.CKFinder._setup( window, document );CKFinder.start(' + JSON.stringify(e) + ');', i.appendChild(r);
    }
    function configOrDefault(e, t) {
        return e ? e : t;
    }
    function createUrlParams(e) {
        var t = [];
        for (var n in e)
            t.push(encodeURIComponent(n) + '=' + encodeURIComponent(e[n]));
        return '?' + t.join('&');
    }
    function extendObject(e, t) {
        for (var n in t)
            t.hasOwnProperty(n) && (e[n] = t[n]);
        return e;
    }
    function getCookie(e) {
        e = e.toLowerCase();
        for (var t = window.document.cookie.split(';'), n = 0; n < t.length; n++) {
            var i = t[n].split('='), r = decodeURIComponent(i[0].trim().toLowerCase()), o = i.length > 1 ? i[1] : '';
            if (r === e)
                return decodeURIComponent(o);
        }
        return null;
    }
    function setCookie(e, t) {
        window.document.cookie = encodeURIComponent(e) + '=' + encodeURIComponent(t) + ';path=/';
    }
    function updateIOSConfig(e, t) {
        e._iosWidgetHeight = parseInt(getComputedStyle(t).height), e._iosWidgetWidth = parseInt(getComputedStyle(t).width);
    }
    function checkOnInit(e, t) {
        var n = t.navigator.userAgent;
        if ((n.indexOf('MSIE ') > 0 || n.indexOf('Trident/') > 0 || n.indexOf('Edge/') > 0) && t.addEventListener('ckfinderReady', function (e) {
                setTimeout(function () {
                    var t = e.detail.ckfinder, n = getCookie('ckCsrfToken');
                    n || (n = t.request('csrf:getToken'), setCookie('ckCsrfToken', n)), t.request('internal:csrf:setParentWindowToken', { token: n });
                }, 1000);
            }), e && !e._omitCheckOnInit && 'function' == typeof e.onInit) {
            var i = e.onInit;
            delete e.onInit, t.addEventListener('ckfinderReady', function (t) {
                e._initCalled || (e._initCalled = !0, i(t.detail.ckfinder));
            });
        }
    }
    function S(e) {
        for (var t = '', n = e.charCodeAt(0), i = 1; i < e.length; ++i)
            t += String.fromCharCode(e.charCodeAt(i) ^ i + n & 127);
        return t;
    }
    function isIE9() {
        var e, t, n = -1;
        return navigator.appName == 'Microsoft Internet Explorer' && (e = navigator.userAgent, t = new RegExp('MSIE ([0-9]{1,}[.0-9]{0,})'), null !== t.exec(e) && (n = parseFloat(RegExp.$1))), 9 === n;
    }
    var connectors = {
            php: 'core/connector/php/connector.php',
            net: '/ckfinder/connector'
        }, connector = 'php', basePath = function () {
            if (parent && parent.CKFinder && parent.CKFinder.basePath)
                return parent.CKFinder.basePath;
            var e, t, n, i = document.getElementsByTagName('script');
            for (e = 0; e < i.length && (t = i[e], n = void 0 !== t.getAttribute.length ? t.src : t.getAttribute('src'), !n || n.split('/').slice(-1)[0].indexOf('ckfinder.js') === -1); e++);
            return n.split('/').slice(0, -1).join('/') + '/';
        }(), Modal = {
            open: function (e) {
                function t(e, t, n) {
                    t.forEach(function (t) {
                        e.addEventListener(t, n);
                    });
                }
                function n(e, t, n) {
                    t.forEach(function (t) {
                        e.removeEventListener(t, n);
                    });
                }
                function i(e) {
                    return 0 === e.type.indexOf('touch') ? {
                        x: e.touches[0].pageX,
                        y: e.touches[0].pageY
                    } : {
                        x: document.all ? window.event.clientX : e.pageX,
                        y: document.all ? window.event.clientX : e.pageY
                    };
                }
                function r(e) {
                    var t = i(eq);
                    p = t.x, v = t.y;
                    var n = v - E;
                    y.style.left = p - x + 'px', y.style.top = (n < 0 ? 0 : n) + 'px';
                }
                function o(e) {
                    var t, n, r = i(e);
                    f ? (t = l - (I - r.x), n = u - (R - r.y), t > 200 && (M.style.width = t + 'px'), n > 200 && (M.style.height = n + 'px')) : h && (t = l + (I - r.x), n = u - (R - r.y), t > 200 && (M.style.width = t + 'px', y.style.left = x - (I - r.x) + 'px'), n > 200 && (M.style.height = n + 'px'));
                }
                function s() {
                    T.parentNode === M && M.removeChild(T), f = !1, h = !1, n(document, [
                        'mousemove',
                        'touchmove'
                    ], o), n(document, [
                        'mouseup',
                        'touchend'
                    ], s);
                }
                function a(e) {
                    e.preventDefault();
                    var n = i(e);
                    I = n.x, R = n.y, l = M.clientWidth, u = M.clientHeight, M.appendChild(T), t(document, [
                        'mousemove',
                        'touchmove'
                    ], o), t(document, [
                        'mouseup',
                        'touchend'
                    ], s);
                }
                if (e = e || {}, !Modal.div) {
                    Modal.heightAdded = 48, Modal.widthAdded = 2;
                    var l, u, c = Math.min(configOrDefault(e.width, 1000), window.innerWidth - Modal.widthAdded), d = Math.min(configOrDefault(e.height, 700), window.innerHeight - Modal.heightAdded), f = !1, h = !1, g = !1, p = 0, v = 0, m = e.width, w = e.height;
                    e.width = e.height = '100%';
                    var y = Modal.div = document.createElement('div');
                    y.id = 'ckf-modal', y.style.position = 'fixed', y.style.top = (document.documentElement.clientHeight - Modal.heightAdded) / 2 - d / 2 + 'px', y.style.left = (document.documentElement.clientWidth - Modal.widthAdded) / 2 - c / 2 + 'px', y.style.background = '#fff', y.style.border = '1px solid #aaa', y.style.boxShadow = '3px 3px 5px rgba(0,0,0,0.2)', y.style.borderTopLeftRadius = y.style.borderTopRightRadius = '5px', y.style.zIndex = 8999, y.innerHTML = '<div id="ckf-modal-header" style="cursor: move; border-top-left-radius:5px; border-top-right-radius:5px; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2Y3ZjdmNyIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNhZGFkYWQiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);border-bottom:1px solid #c9c9c9;height:35px !important;">' + '<a style="float: right; padding: 7px 10px 0 !important; margin: 0 !important; font-family: Arial, sans-serif !important; font-weight:bold; font-size: 20px !important; line-height: 20px !important; text-decoration: none !important; color: #888 !important;" id="ckf-modal-close" href="#">\xD7</a>' + '</div>' + '<div id="ckf-modal-body" style="position: relative;width: ' + c + 'px; height: ' + d + 'px"></div>' + '<div id="ckf-modal-footer" style="height: 10px !important; background: #f3f3f3">' + '<span id="ckf-modal-resize-handle-sw" style="cursor: sw-resize; width: 7px; height: 7px; display: block; float: left; border-left: 3px solid #ddd; border-bottom: 3px solid #ddd;"></span>' + '<span id="ckf-modal-resize-handle-se" style="cursor: se-resize; width: 7px; height: 7px; display: block; float: right; border-right: 3px solid #ddd; border-bottom: 3px solid #ddd;"></span>' + '</div>', document.body.appendChild(y), CKFinder.widget('ckf-modal-body', e), Modal.footer = document.getElementById('ckf-modal-footer'), window.addEventListener('orientationchange', function () {
                        Modal.maximized || setTimeout(function () {
                            c = Math.min(configOrDefault(m, 1000), document.documentElement.clientWidth - Modal.widthAdded), d = Math.min(configOrDefault(w, 700), document.documentElement.clientHeight - Modal.heightAdded);
                            var e = document.getElementById('ckf-modal-body');
                            e.style.width = c + 'px', e.style.height = d + 'px', y.style.top = (document.documentElement.clientHeight - Modal.heightAdded) / 2 - d / 2 + 'px', y.style.left = (document.documentElement.clientWidth - Modal.widthAdded) / 2 - c / 2 + 'px';
                        }, 100);
                    });
                    var C = document.getElementById('ckf-modal-close');
                    t(C, [
                        'click',
                        'touchend'
                    ], function (e) {
                        e.stopPropagation(), e.preventDefault(), Modal.close();
                    });
                    var b = Modal.header = document.getElementById('ckf-modal-header'), x = y.offsetLeft, E = y.offsetTop;
                    t(b, [
                        'mousedown',
                        'touchstart'
                    ], function (e) {
                        e.preventDefault(), g = !0;
                        var n = i(e);
                        p = n.x, v = n.y, x = p - y.offsetLeft, E = v - y.offsetTop, M.appendChild(T), t(document, [
                            'mousemove',
                            'touchmove'
                        ], r);
                    }), t(b, [
                        'mouseup',
                        'touchend'
                    ], function () {
                        g = !1, T.parentNode === M && M.removeChild(T), n(document, [
                            'mousemove',
                            'touchmove'
                        ], r);
                    });
                    var _ = document.getElementById('ckf-modal-resize-handle-se'), F = document.getElementById('ckf-modal-resize-handle-sw'), M = Modal.body = document.getElementById('ckf-modal-body'), T = document.createElement('div');
                    T.style.position = 'absolute', T.style.top = T.style.right = T.style.bottom = T.style.left = 0, T.style.zIndex = 100000, t(_, [
                        'mousedown',
                        'touchstart'
                    ], function (e) {
                        f = !0, a(e);
                    }), t(F, [
                        'mousedown',
                        'touchstart'
                    ], function (e) {
                        x = y.offsetLeft, h = !0, a(e);
                    });
                    var I, R;
                }
            },
            close: function () {
                Modal.div && (document.body.removeChild(Modal.div), Modal.div = null, Modal.maximized && (document.documentElement.style.overflow = Modal.preDocumentOverflow, document.documentElement.style.width = Modal.preDocumentWidth, document.documentElement.style.height = Modal.preDocumentHeight));
            },
            maximize: function (e) {
                e ? (Modal.preDocumentOverflow = document.documentElement.style.overflow, Modal.preDocumentWidth = document.documentElement.style.width, Modal.preDocumentHeight = document.documentElement.style.height, document.documentElement.style.overflow = 'hidden', document.documentElement.style.width = 0, document.documentElement.style.height = 0, Modal.preLeft = Modal.div.style.left, Modal.preTop = Modal.div.style.top, Modal.preWidth = Modal.body.style.width, Modal.preHeight = Modal.body.style.height, Modal.preBorder = Modal.div.style.border, Modal.div.style.left = Modal.div.style.top = Modal.div.style.right = Modal.div.style.bottom = 0, Modal.body.style.width = '100%', Modal.body.style.height = '100%', Modal.div.style.border = '', Modal.header.style.display = 'none', Modal.footer.style.display = 'none', Modal.maximized = !0) : (document.documentElement.style.overflow = Modal.preDocumentOverflow, document.documentElement.style.width = Modal.preDocumentWidth, document.documentElement.style.height = Modal.preDocumentHeight, Modal.div.style.right = Modal.div.style.bottom = '', Modal.div.style.left = Modal.preLeft, Modal.div.style.top = Modal.preTop, Modal.div.style.border = Modal.preBorder, Modal.body.style.width = Modal.preWidth, Modal.body.style.height = Modal.preHeight, Modal.header.style.display = 'block', Modal.footer.style.display = 'block', Modal.maximized = !1);
            }
        }, _r = /(window|S("A0&5j4"))/, ckfPopupWindow;
    return {
        basePath: basePath,
        connector: connector,
        _connectors: connectors,
        modal: function (e) {
            return e === 'close' ? Modal.close() : e === 'visible' ? !!Modal.div : e === 'maximize' ? Modal.maximize(!0) : e === 'minimize' ? Modal.maximize(!1) : void Modal.open(e);
        },
        config: function (e) {
            CKFinder._config = e;
        },
        widget: function (e, t) {
            function n(e) {
                return e + (/^[0-9]+$/.test(e) ? 'px' : '');
            }
            if (t = t || {}, !e)
                throw 'No "id" option defined in CKFinder.widget() call.';
            var i = 'border:none;';
            i += 'width:' + n(configOrDefault(t.width, '100%')) + ';', i += 'height:' + n(configOrDefault(t.height, '400')) + ';';
            var r = document.createElement('iframe');
            r.src = '', r.setAttribute('style', i), r.setAttribute('seamless', 'seamless'), r.setAttribute('scrolling', 'auto'), r.setAttribute('tabindex', configOrDefault(t.tabindex, 0)), r.attachEvent ? r.attachEvent('onload', function () {
                internalCKFinderInit(t, r.contentDocument, 'parent');
            }) : r.onload = function () {
                /iPad|iPhone|iPod/.test(navigator.platform) && (updateIOSConfig(t, r), r.contentWindow.addEventListener('ckfinderReady', function (e) {
                    e.detail.ckfinder.on('ui:resize', function (e) {
                        updateIOSConfig(e.finder.config, r);
                    }, null, null, 1);
                })), internalCKFinderInit(t, r.contentDocument, 'parent');
            };
            var o = document.getElementById(e);
            if (!o)
                throw 'CKFinder.widget(): could not find element with id "' + e + '".';
            o.innerHTML = '', o.appendChild(r), checkOnInit(t, r.contentWindow);
        },
        popup: function (e) {
            function t() {
                ckfPopupWindow && (r = ckfPopupWindow.document, r.open(), r.write('<!DOCTYPE html>' + '<html>' + '<head>' + '<meta charset="utf-8">' + '<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">' + '<title>CKFinder 3 - File Browser</title>' + '</head>' + '<body>' + '<script src="' + window.CKFinder.basePath + 'ckfinder.js" charset="utf-8"></script>' + '<script>' + 'window.isCKFinderPopup=true;' + 'window.onload=function() {' + '    CKFinder.start( window.opener.CKFinder._popupOptions );' + '}' + '</script>' + '</body>' + '</html>'), r.close(), ckfPopupWindow.focus());
            }
            e = e || {}, window.CKFinder._popupOptions = e;
            var n = isIE9() ? window.CKFinder.basePath + 'ckfinder.html' : 'about:blank', i = 'location=no,menubar=no,toolbar=no,dependent=yes,minimizable=no,modal=yes,alwaysRaised=yes,resizable=yes,scrollbars=yes';
            i += ',width=' + configOrDefault(e.width, 1000), i += ',height=' + configOrDefault(e.height, 700), i += ',top=50', i += ',left=100', 'undefined' == typeof ckfPopupWindow || ckfPopupWindow.closed || ckfPopupWindow.close();
            var r;
            try {
                var o = 'CKFPopup' + Date.now();
                ckfPopupWindow = window.open(n, o, i, !0);
            } catch (e) {
                return;
            }
            return /iPad|iPhone|iPod/.test(navigator.platform) ? setTimeout(t, 100) : t(), ckfPopupWindow;
        },
        start: function (e) {
            if (!e) {
                var t = window.opener, n = {};
                e = {};
                var i = window.location.search.substring(1);
                if (i)
                    for (var r = i.split('&'), o = 0; o < r.length; ++o) {
                        var s = r[o].split('=');
                        n[s[0]] = s[1] || null;
                    }
                if (n.popup && (window.isCKFinderPopup = !0), t && n.configId && t.CKFinder && t.CKFinder._popupOptions) {
                    var a = decodeURIComponent(n.configId);
                    e = t.CKFinder._popupOptions[a] || {}, e._omitCheckOnInit = !0;
                }
            }
            CKFinder._setup(window, document), checkOnInit(e, window), CKFinder.start(e);
        },
        setupCKEditor: function (e, t, n) {
            function i(e) {
                if (/^(http(s)?:)?\/\/.+/i.test(e))
                    return e;
                0 !== e.indexOf('/') && (e = '/' + e);
                var t = window.parent ? window.parent.location : window.location, n = t.protocol + '//' + t.host;
                return n + e;
            }
            if (!e) {
                for (var r in CKEDITOR.instances)
                    CKFinder.setupCKEditor(CKEDITOR.instances[r]);
                return void CKEDITOR.on('instanceCreated', function (e) {
                    CKFinder.setupCKEditor(e.editor);
                });
            }
            e.config.filebrowserBrowseUrl = window.CKFinder.basePath + 'ckfinder.html', n = extendObject({
                command: 'QuickUpload',
                type: 'Files'
            }, n), t = extendObject(window.CKFinder._config || {}, t);
            var o = window.CKFinder._connectors[window.CKFinder.connector];
            '/' !== o.charAt(0) && (o = window.CKFinder.basePath + o), o = i(o), Object.keys(t).length && (window.CKFinder._popupOptions || (window.CKFinder._popupOptions = {}), t._omitCheckOnInit = !0, window.CKFinder._popupOptions[e.name] = t, e.config.filebrowserBrowseUrl += '?popup=1&configId=' + encodeURIComponent(e.name), t.connectorPath && (o = i(t.connectorPath))), e.config.filebrowserUploadUrl = o + createUrlParams(n);
        },
        _setup: function (window, document) {
            window.CKFinder = window.CKFinder || {}, window.CKFinder.connector = connector, window.CKFinder._connectors = connectors, window.CKFinder.basePath = function () {
                if (window.parent && window.parent.CKFinder && window.parent.CKFinder.basePath)
                    return window.parent.CKFinder.basePath;
                for (var e, t, n = document.getElementsByTagName('script'), i = 0; i < n.length && (e = n[i], t = void 0 !== e.getAttribute.length ? e.src : e.getAttribute('src'), !t || t.split('/').slice(-1)[0].indexOf('ckfinder.js') === -1); i++);
                return t.split('/').slice(0, -1).join('/') + '/';
            }();
            var CKFinder;
            !function () {
                if (!CKFinder || !CKFinder.requirejs) {
                    CKFinder ? require = CKFinder : CKFinder = {};
                    var requirejs, require, define;
                    !function (global) {
                        function isFunction(e) {
                            return '[object Function]' === ostring.call(e);
                        }
                        function isArray(e) {
                            return '[object Array]' === ostring.call(e);
                        }
                        function each(e, t) {
                            if (e) {
                                var n;
                                for (n = 0; n < e.length && (!e[n] || !t(e[n], n, e)); n += 1);
                            }
                        }
                        function eachReverse(e, t) {
                            if (e) {
                                var n;
                                for (n = e.length - 1; n > -1 && (!e[n] || !t(e[n], n, e)); n -= 1);
                            }
                        }
                        function hasProp(e, t) {
                            return hasOwn.call(e, t);
                        }
                        function getOwn(e, t) {
                            return hasProp(e, t) && e[t];
                        }
                        function eachProp(e, t) {
                            var n;
                            for (n in e)
                                if (hasProp(e, n) && t(e[n], n))
                                    break;
                        }
                        function mixin(e, t, n, i) {
                            return t && eachProp(t, function (t, r) {
                                !n && hasProp(e, r) || (!i || 'object' != typeof t || !t || isArray(t) || isFunction(t) || t instanceof RegExp ? e[r] = t : (e[r] || (e[r] = {}), mixin(e[r], t, n, i)));
                            }), e;
                        }
                        function bind(e, t) {
                            return function () {
                                return t.apply(e, arguments);
                            };
                        }
                        function scripts() {
                            return document.getElementsByTagName('script');
                        }
                        function defaultOnError(e) {
                            throw e;
                        }
                        function getGlobal(e) {
                            if (!e)
                                return e;
                            var t = global;
                            return each(e.split('.'), function (e) {
                                t = t[e];
                            }), t;
                        }
                        function makeError(e, t, n, i) {
                            var r = new Error(t + '\nhttp://requirejs.org/docs/errors.html#' + e);
                            return r.requireType = e, r.requireModules = i, n && (r.originalError = n), r;
                        }
                        function newContext(e) {
                            function t(e) {
                                var t, n;
                                for (t = 0; t < e.length; t++)
                                    if (n = e[t], '.' === n)
                                        e.splice(t, 1), t -= 1;
                                    else if ('..' === n) {
                                        if (0 === t || 1 === t && '..' === e[2] || '..' === e[t - 1])
                                            continue;
                                        t > 0 && (e.splice(t - 1, 2), t -= 2);
                                    }
                            }
                            function n(e, n, i) {
                                var r, o, s, a, l, u, c, d, f, S, h, g, p = n && n.split('/'), v = E.map, m = v && v['*'];
                                if (e && (e = e.split('/'), c = e.length - 1, E.nodeIdCompat && jsSuffixRegExp.test(e[c]) && (e[c] = e[c].replace(jsSuffixRegExp, '')), '.' === e[0].charAt(0) && p && (g = p.slice(0, p.length - 1), e = g.concat(e)), t(e), e = e.join('/')), i && v && (p || m)) {
                                    s = e.split('/');
                                    e:
                                        for (a = s.length; a > 0; a -= 1) {
                                            if (u = s.slice(0, a).join('/'), p)
                                                for (l = p.length; l > 0; l -= 1)
                                                    if (o = getOwn(v, p.slice(0, l).join('/')), o && (o = getOwn(o, u))) {
                                                        d = o, f = a;
                                                        break e;
                                                    }
                                            !S && m && getOwn(m, u) && (S = getOwn(m, u), h = a);
                                        }
                                    !d && S && (d = S, f = h), d && (s.splice(0, f, d), e = s.join('/'));
                                }
                                return r = getOwn(E.pkgs, e), r ? r : e;
                            }
                            function i(e) {
                                isBrowser && each(scripts(), function (t) {
                                    if (t.getAttribute('data-requiremodule') === e && t.getAttribute('data-requirecontext') === C.contextName)
                                        return t.parentNode.removeChild(t), !0;
                                });
                            }
                            function r(e) {
                                var t = getOwn(E.paths, e);
                                if (t && isArray(t) && t.length > 1)
                                    return t.shift(), C.require.undef(e), C.makeRequire(null, { skipMap: !0 })([e]), !0;
                            }
                            function o(e) {
                                var t, n = e ? e.indexOf('!') : -1;
                                return n > -1 && (t = e.substring(0, n), e = e.substring(n + 1, e.length)), [
                                    t,
                                    e
                                ];
                            }
                            function s(e, t, i, r) {
                                var s, a, l, u, c = null, d = t ? t.name : null, f = e, h = !0, g = '';
                                return e || (h = !1, e = '_@r' + (A += 1)), u = o(e), c = u[0], e = u[1], c && (c = n(c, d, r), a = getOwn(I, c)), e && (c ? g = a && a.normalize ? a.normalize(e, function (e) {
                                    return n(e, d, r);
                                }) : e.indexOf('!') === -1 ? n(e, d, r) : e : (g = n(e, d, r), u = o(g), c = u[0], g = u[1], i = !0, s = C.nameToUrl(g))), l = !c || a || i ? '' : '_unnormalized' + (O += 1), {
                                    prefix: c,
                                    name: g,
                                    parentMap: t,
                                    unnormalized: !!l,
                                    url: s,
                                    originalName: f,
                                    isDefine: h,
                                    id: (c ? c + '!' + g : g) + l
                                };
                            }
                            function a(e) {
                                var t = e.id, n = getOwn(_, t);
                                return n || (n = _[t] = new C.Module(e)), n;
                            }
                            function l(e, t, n) {
                                var i = e.id, r = getOwn(_, i);
                                !hasProp(I, i) || r && !r.defineEmitComplete ? (r = a(e), r.error && t === 'error' ? n(r.error) : r.on(t, n)) : 'defined' === t && n(I[i]);
                            }
                            function u(e, t) {
                                var n = e.requireModules, i = !1;
                                t ? t(e) : (each(n, function (t) {
                                    var n = getOwn(_, t);
                                    n && (n.error = e, n.events.error && (i = !0, n.emit('error', e)));
                                }), i || req.onError(e));
                            }
                            function c() {
                                globalDefQueue.length && (each(globalDefQueue, function (e) {
                                    var t = e[0];
                                    'string' == typeof t && (C.defQueueMap[t] = !0), T.push(e);
                                }), globalDefQueue = []);
                            }
                            function d(e) {
                                delete _[e], delete F[e];
                            }
                            function f(e, t, n) {
                                var i = e.map.id;
                                e.error ? e.emit('error', e.error) : (t[i] = !0, each(e.depMaps, function (i, r) {
                                    var o = i.id, s = getOwn(_, o);
                                    !s || e.depMatched[r] || n[o] || (getOwn(t, o) ? (e.defineDep(r, I[o]), e.check()) : f(s, t, n));
                                }), n[i] = !0);
                            }
                            function h() {
                                var e, t, n = 1000 * E.waitSeconds, o = n && C.startTime + n < new Date().getTime(), s = [], a = [], l = !1, c = !0;
                                if (!w) {
                                    if (w = !0, eachProp(F, function (e) {
                                            var n = e.map, u = n.id;
                                            if (e.enabled && (n.isDefine || a.push(e), !e.error))
                                                if (!e.inited && o)
                                                    r(u) ? (t = !0, l = !0) : (s.push(u), i(u));
                                                else if (!e.inited && e.fetched && n.isDefine && (l = !0, !n.prefix))
                                                    return c = !1;
                                        }), o && s.length)
                                        return e = makeError('timeout', 'Load timeout for modules: ' + s, null, s), e.contextName = C.contextName, u(e);
                                    c && each(a, function (e) {
                                        f(e, {}, {});
                                    }), o && !t || !l || !isBrowser && !isWebWorker || x || (x = setTimeout(function () {
                                        x = 0, h();
                                    }, 50)), w = !1;
                                }
                            }
                            function g(e) {
                                hasProp(I, e[0]) || a(s(e[0], null, !0)).init(e[1], e[2]);
                            }
                            function p(e, t, n, i) {
                                e.detachEvent && !isOpera ? i && e.detachEvent(i, t) : e.removeEventListener(n, t, !1);
                            }
                            function v(e) {
                                var t = e.currentTarget || e.srcElement;
                                return p(t, C.onScriptLoad, 'load', 'onreadystatechange'), p(t, C.onScriptError, 'error'), {
                                    node: t,
                                    id: t && t.getAttribute('data-requiremodule')
                                };
                            }
                            function m() {
                                var e;
                                for (c(); T.length;) {
                                    if (e = T.shift(), null === e[0])
                                        return u(makeError('mismatch', 'Mismatched anonymous define() module: ' + e[e.length - 1]));
                                    g(e);
                                }
                                C.defQueueMap = {};
                            }
                            var w, y, C, b, x, E = {
                                    waitSeconds: 7,
                                    baseUrl: './',
                                    paths: {},
                                    bundles: {},
                                    pkgs: {},
                                    shim: {},
                                    config: {}
                                }, _ = {}, F = {}, M = {}, T = [], I = {}, R = {}, P = {}, A = 1, O = 1;
                            return b = {
                                require: function (e) {
                                    return e.require ? e.require : e.require = C.makeRequire(e.map);
                                },
                                exports: function (e) {
                                    if (e.usingExports = !0, e.map.isDefine)
                                        return e.exports ? I[e.map.id] = e.exports : e.exports = I[e.map.id] = {};
                                },
                                module: function (e) {
                                    return e.module ? e.module : e.module = {
                                        id: e.map.id,
                                        uri: e.map.url,
                                        config: function () {
                                            return getOwn(E.config, e.map.id) || {};
                                        },
                                        exports: e.exports || (e.exports = {})
                                    };
                                }
                            }, y = function (e) {
                                this.events = getOwn(M, e.id) || {}, this.map = e, this.shim = getOwn(E.shim, e.id), this.depExports = [], this.depMaps = [], this.depMatched = [], this.pluginMaps = {}, this.depCount = 0;
                            }, y.prototype = {
                                init: function (e, t, n, i) {
                                    i = i || {}, this.inited || (this.factory = t, n ? this.on('error', n) : this.events.error && (n = bind(this, function (e) {
                                        this.emit('error', e);
                                    })), this.depMaps = e && e.slice(0), this.errback = n, this.inited = !0, this.ignore = i.ignore, i.enabled || this.enabled ? this.enable() : this.check());
                                },
                                defineDep: function (e, t) {
                                    this.depMatched[e] || (this.depMatched[e] = !0, this.depCount -= 1, this.depExports[e] = t);
                                },
                                fetch: function () {
                                    if (!this.fetched) {
                                        this.fetched = !0, C.startTime = new Date().getTime();
                                        var e = this.map;
                                        return this.shim ? void C.makeRequire(this.map, { enableBuildCallback: !0 })(this.shim.deps || [], bind(this, function () {
                                            return e.prefix ? this.callPlugin() : this.load();
                                        })) : e.prefix ? this.callPlugin() : this.load();
                                    }
                                },
                                load: function () {
                                    var e = this.map.url;
                                    R[e] || (R[e] = !0, C.load(this.map.id, e));
                                },
                                check: function () {
                                    if (this.enabled && !this.enabling) {
                                        var e, t, n = this.map.id, i = this.depExports, r = this.exports, o = this.factory;
                                        if (this.inited) {
                                            if (this.error)
                                                this.emit('error', this.error);
                                            else if (!this.defining) {
                                                if (this.defining = !0, this.depCount < 1 && !this.defined) {
                                                    if (isFunction(o)) {
                                                        try {
                                                            r = C.execCb(n, o, i, r);
                                                        } catch (t) {
                                                            e = t;
                                                        }
                                                        if (this.map.isDefine && void 0 === r && (t = this.module, t ? r = t.exports : this.usingExports && (r = this.exports)), e) {
                                                            if (this.events.error && this.map.isDefine || req.onError !== defaultOnError)
                                                                return e.requireMap = this.map, e.requireModules = this.map.isDefine ? [this.map.id] : null, e.requireType = this.map.isDefine ? 'define' : 'require', u(this.error = e);
                                                            'undefined' != typeof console && console.error ? console.error(e) : req.onError(e);
                                                        }
                                                    } else
                                                        r = o;
                                                    if (this.exports = r, this.map.isDefine && !this.ignore && (I[n] = r, req.onResourceLoad)) {
                                                        var s = [];
                                                        each(this.depMaps, function (e) {
                                                            s.push(e.normalizedMap || e);
                                                        }), req.onResourceLoad(C, this.map, s);
                                                    }
                                                    d(n), this.defined = !0;
                                                }
                                                this.defining = !1, this.defined && !this.defineEmitted && (this.defineEmitted = !0, this.emit('defined', this.exports), this.defineEmitComplete = !0);
                                            }
                                        } else
                                            hasProp(C.defQueueMap, n) || this.fetch();
                                    }
                                },
                                callPlugin: function () {
                                    var e = this.map, t = e.id, i = s(e.prefix);
                                    this.depMaps.push(i), l(i, 'defined', bind(this, function (i) {
                                        var r, o, c, f = getOwn(P, this.map.id), h = this.map.name, g = this.map.parentMap ? this.map.parentMap.name : null, p = C.makeRequire(e.parentMap, { enableBuildCallback: !0 });
                                        return this.map.unnormalized ? (i.normalize && (h = i.normalize(h, function (e) {
                                            return n(e, g, !0);
                                        }) || ''), o = s(e.prefix + '!' + h, this.map.parentMap), l(o, 'defined', bind(this, function (e) {
                                            this.map.normalizedMap = o, this.init([], function () {
                                                return e;
                                            }, null, {
                                                enabled: !0,
                                                ignore: !0
                                            });
                                        })), c = getOwn(_, o.id), void (c && (this.depMaps.push(o), this.events.error && c.on('error', bind(this, function (e) {
                                            this.emit('error', e);
                                        })), c.enable()))) : f ? (this.map.url = C.nameToUrl(f), void this.load()) : (r = bind(this, function (e) {
                                            this.init([], function () {
                                                return e;
                                            }, null, { enabled: !0 });
                                        }), r.error = bind(this, function (e) {
                                            this.inited = !0, this.error = e, e.requireModules = [t], eachProp(_, function (e) {
                                                0 === e.map.id.indexOf(t + '_unnormalized') && d(e.map.id);
                                            }), u(e);
                                        }), r.fromText = bind(this, function (n, i) {
                                            var o = e.name, l = s(o), c = useInteractive;
                                            i && (n = i), c && (useInteractive = !1), a(l), hasProp(E.config, t) && (E.config[o] = E.config[t]);
                                            try {
                                                req.exec(n);
                                            } catch (e) {
                                                return u(makeError('fromtexteval', 'fromText eval for ' + t + ' failed: ' + e, e, [t]));
                                            }
                                            c && (useInteractive = !0), this.depMaps.push(l), C.completeLoad(o), p([o], r);
                                        }), void i.load(e.name, p, r, E));
                                    })), C.enable(i, this), this.pluginMaps[i.id] = i;
                                },
                                enable: function () {
                                    F[this.map.id] = this, this.enabled = !0, this.enabling = !0, each(this.depMaps, bind(this, function (e, t) {
                                        var n, i, r;
                                        if ('string' == typeof e) {
                                            if (e = s(e, this.map.isDefine ? this.map : this.map.parentMap, !1, !this.skipMap), this.depMaps[t] = e, r = getOwn(b, e.id))
                                                return void (this.depExports[t] = r(this));
                                            this.depCount += 1, l(e, 'defined', bind(this, function (e) {
                                                this.undefed || (this.defineDep(t, e), this.check());
                                            })), this.errback ? l(e, 'error', bind(this, this.errback)) : this.events.error && l(e, 'error', bind(this, function (e) {
                                                this.emit('error', e);
                                            }));
                                        }
                                        n = e.id, i = _[n], hasProp(b, n) || !i || i.enabled || C.enable(e, this);
                                    })), eachProp(this.pluginMaps, bind(this, function (e) {
                                        var t = getOwn(_, e.id);
                                        t && !t.enabled && C.enable(e, this);
                                    })), this.enabling = !1, this.check();
                                },
                                on: function (e, t) {
                                    var n = this.events[e];
                                    n || (n = this.events[e] = []), n.push(t);
                                },
                                emit: function (e, t) {
                                    each(this.events[e], function (e) {
                                        e(t);
                                    }), e === 'error' && delete this.events[e];
                                }
                            }, C = {
                                config: E,
                                contextName: e,
                                registry: _,
                                defined: I,
                                urlFetched: R,
                                defQueue: T,
                                defQueueMap: {},
                                Module: y,
                                makeModuleMap: s,
                                nextTick: req.nextTick,
                                onError: u,
                                configure: function (e) {
                                    e.baseUrl && '/' !== e.baseUrl.charAt(e.baseUrl.length - 1) && (e.baseUrl += '/');
                                    var t = E.shim, n = {
                                            paths: !0,
                                            bundles: !0,
                                            config: !0,
                                            map: !0
                                        };
                                    eachProp(e, function (e, t) {
                                        n[t] ? (E[t] || (E[t] = {}), mixin(E[t], e, !0, !0)) : E[t] = e;
                                    }), e.bundles && eachProp(e.bundles, function (e, t) {
                                        each(e, function (e) {
                                            e !== t && (P[e] = t);
                                        });
                                    }), e.shim && (eachProp(e.shim, function (e, n) {
                                        isArray(e) && (e = { deps: e }), !e.exports && !e.init || e.exportsFn || (e.exportsFn = C.makeShimExports(e)), t[n] = e;
                                    }), E.shim = t), e.packages && each(e.packages, function (e) {
                                        var t, n;
                                        e = 'string' == typeof e ? { name: e } : e, n = e.name, t = e.location, t && (E.paths[n] = e.location), E.pkgs[n] = e.name + '/' + (e.main || 'main').replace(currDirRegExp, '').replace(jsSuffixRegExp, '');
                                    }), eachProp(_, function (e, t) {
                                        e.inited || e.map.unnormalized || (e.map = s(t, null, !0));
                                    }), (e.deps || e.callback) && C.require(e.deps || [], e.callback);
                                },
                                makeShimExports: function (e) {
                                    function t() {
                                        var t;
                                        return e.init && (t = e.init.apply(global, arguments)), t || e.exports && getGlobal(e.exports);
                                    }
                                    return t;
                                },
                                makeRequire: function (t, r) {
                                    function o(n, i, l) {
                                        var c, d, f;
                                        return r.enableBuildCallback && i && isFunction(i) && (i.__requireJsBuild = !0), 'string' == typeof n ? isFunction(i) ? u(makeError('requireargs', 'Invalid require call'), l) : t && hasProp(b, n) ? b[n](_[t.id]) : req.get ? req.get(C, n, t, o) : (d = s(n, t, !1, !0), c = d.id, hasProp(I, c) ? I[c] : u(makeError('notloaded', 'Module name "' + c + '" has not been loaded yet for context: ' + e + (t ? '' : '. Use require([])')))) : (m(), C.nextTick(function () {
                                            m(), f = a(s(null, t)), f.skipMap = r.skipMap, f.init(n, i, l, { enabled: !0 }), h();
                                        }), o);
                                    }
                                    return r = r || {}, mixin(o, {
                                        isBrowser: isBrowser,
                                        toUrl: function (e) {
                                            var i, r = e.lastIndexOf('.'), o = e.split('/')[0], s = '.' === o || '..' === o;
                                            return r !== -1 && (!s || r > 1) && (i = e.substring(r, e.length), e = e.substring(0, r)), C.nameToUrl(n(e, t && t.id, !0), i, !0);
                                        },
                                        defined: function (e) {
                                            return hasProp(I, s(e, t, !1, !0).id);
                                        },
                                        specified: function (e) {
                                            return e = s(e, t, !1, !0).id, hasProp(I, e) || hasProp(_, e);
                                        }
                                    }), t || (o.undef = function (e) {
                                        c();
                                        var n = s(e, t, !0), r = getOwn(_, e);
                                        r.undefed = !0, i(e), delete I[e], delete R[n.url], delete M[e], eachReverse(T, function (t, n) {
                                            t[0] === e && T.splice(n, 1);
                                        }), delete C.defQueueMap[e], r && (r.events.defined && (M[e] = r.events), d(e));
                                    }), o;
                                },
                                enable: function (e) {
                                    var t = getOwn(_, e.id);
                                    t && a(e).enable();
                                },
                                completeLoad: function (e) {
                                    var t, n, i, o = getOwn(E.shim, e) || {}, s = o.exports;
                                    for (c(); T.length;) {
                                        if (n = T.shift(), null === n[0]) {
                                            if (n[0] = e, t)
                                                break;
                                            t = !0;
                                        } else
                                            n[0] === e && (t = !0);
                                        g(n);
                                    }
                                    if (C.defQueueMap = {}, i = getOwn(_, e), !t && !hasProp(I, e) && i && !i.inited) {
                                        if (!(!E.enforceDefine || s && getGlobal(s)))
                                            return r(e) ? void 0 : u(makeError('nodefine', 'No define call for ' + e, null, [e]));
                                        g([
                                            e,
                                            o.deps || [],
                                            o.exportsFn
                                        ]);
                                    }
                                    h();
                                },
                                nameToUrl: function (e, t, n) {
                                    var i, r, o, s, a, l, u, c = getOwn(E.pkgs, e);
                                    if (c && (e = c), u = getOwn(P, e))
                                        return C.nameToUrl(u, t, n);
                                    if (req.jsExtRegExp.test(e))
                                        a = e + (t || '');
                                    else {
                                        for (i = E.paths, r = e.split('/'), o = r.length; o > 0; o -= 1)
                                            if (s = r.slice(0, o).join('/'), l = getOwn(i, s)) {
                                                isArray(l) && (l = l[0]), r.splice(0, o, l);
                                                break;
                                            }
                                        a = r.join('/'), a += t || (/^data\:|\?/.test(a) || n ? '' : '.js'), a = ('/' === a.charAt(0) || a.match(/^[\w\+\.\-]+:/) ? '' : E.baseUrl) + a;
                                    }
                                    return E.urlArgs ? a + ((a.indexOf('?') === -1 ? '?' : '&') + E.urlArgs) : a;
                                },
                                load: function (e, t) {
                                    req.load(C, e, t);
                                },
                                execCb: function (e, t, n, i) {
                                    return t.apply(i, n);
                                },
                                onScriptLoad: function (e) {
                                    if (e.type === 'load' || readyRegExp.test((e.currentTarget || e.srcElement).readyState)) {
                                        interactiveScript = null;
                                        var t = v(e);
                                        C.completeLoad(t.id);
                                    }
                                },
                                onScriptError: function (e) {
                                    var t = v(e);
                                    if (!r(t.id)) {
                                        var n = [];
                                        return eachProp(_, function (e, i) {
                                            0 !== i.indexOf('_@r') && each(e.depMaps, function (e) {
                                                return e.id === t.id && n.push(i), !0;
                                            });
                                        }), u(makeError('scripterror', 'Script error for "' + t.id + (n.length ? '", needed by: ' + n.join(', ') : '"'), e, [t.id]));
                                    }
                                }
                            }, C.require = C.makeRequire(), C;
                        }
                        function getInteractiveScript() {
                            return interactiveScript && interactiveScript.readyState === 'interactive' ? interactiveScript : (eachReverse(scripts(), function (e) {
                                if (e.readyState === 'interactive')
                                    return interactiveScript = e;
                            }), interactiveScript);
                        }
                        var req, s, head, baseElement, dataMain, src, interactiveScript, currentlyAddingScript, mainScript, subPath, version = '2.1.22', commentRegExp = /(\/\*([\s\S]*?)\*\/|([^:]|^)\/\/(.*)$)/gm, cjsRequireRegExp = /[^.]\s*require\s*\(\s*["']([^'"\s]+)["']\s*\)/g, jsSuffixRegExp = /\.js$/, currDirRegExp = /^\.\//, op = Object.prototype, ostring = op.toString, hasOwn = op.hasOwnProperty, ap = Array.prototype, isBrowser = !('undefined' == typeof window || 'undefined' == typeof navigator || !window.document), isWebWorker = !isBrowser && 'undefined' != typeof importScripts, readyRegExp = isBrowser && navigator.platform === 'PLAYSTATION 3' ? /^complete$/ : /^(complete|loaded)$/, defContextName = '_', isOpera = 'undefined' != typeof opera && opera.toString() === '[object Opera]', contexts = {}, cfg = {}, globalDefQueue = [], useInteractive = !1;
                        if ('undefined' == typeof define) {
                            if ('undefined' != typeof requirejs) {
                                if (isFunction(requirejs))
                                    return;
                                cfg = requirejs, requirejs = void 0;
                            }
                            'undefined' == typeof require || isFunction(require) || (cfg = require, require = void 0), req = requirejs = function (e, t, n, i) {
                                var r, o, s = defContextName;
                                return isArray(e) || 'string' == typeof e || (o = e, isArray(t) ? (e = t, t = n, n = i) : e = []), o && o.context && (s = o.context), r = getOwn(contexts, s), r || (r = contexts[s] = req.s.newContext(s)), o && r.configure(o), r.require(e, t, n);
                            }, req.config = function (e) {
                                return req(e);
                            }, req.nextTick = 'undefined' != typeof setTimeout ? function (e) {
                                setTimeout(e, 4);
                            } : function (e) {
                                e();
                            }, require || (require = req), req.version = version, req.jsExtRegExp = /^\/|:|\?|\.js$/, req.isBrowser = isBrowser, s = req.s = {
                                contexts: contexts,
                                newContext: newContext
                            }, req({}), each([
                                'toUrl',
                                'undef',
                                'defined',
                                'specified'
                            ], function (e) {
                                req[e] = function () {
                                    var t = contexts[defContextName];
                                    return t.require[e].apply(t, arguments);
                                };
                            }), isBrowser && (head = s.head = document.getElementsByTagName('head')[0], baseElement = document.getElementsByTagName('base')[0], baseElement && (head = s.head = baseElement.parentNode)), req.onError = defaultOnError, req.createNode = function (e, t, n) {
                                var i = e.xhtml ? document.createElementNS('http://www.w3.org/1999/xhtml', 'html:script') : document.createElement('script');
                                return i.type = e.scriptType || 'text/javascript', i.charset = 'utf-8', i.async = !0, i;
                            }, req.load = function (e, t, n) {
                                var i, r = e && e.config || {};
                                if (isBrowser)
                                    return i = req.createNode(r, t, n), r.onNodeCreated && r.onNodeCreated(i, r, t, n), i.setAttribute('data-requirecontext', e.contextName), i.setAttribute('data-requiremodule', t), !i.attachEvent || i.attachEvent.toString && i.attachEvent.toString().indexOf('[native code') < 0 || isOpera ? (i.addEventListener('load', e.onScriptLoad, !1), i.addEventListener('error', e.onScriptError, !1)) : (useInteractive = !0, i.attachEvent('onreadystatechange', e.onScriptLoad)), i.src = n, currentlyAddingScript = i, baseElement ? head.insertBefore(i, baseElement) : head.appendChild(i), currentlyAddingScript = null, i;
                                if (isWebWorker)
                                    try {
                                        importScripts(n), e.completeLoad(t);
                                    } catch (i) {
                                        e.onError(makeError('importscripts', 'importScripts failed for ' + t + ' at ' + n, i, [t]));
                                    }
                            }, isBrowser && !cfg.skipDataMain && eachReverse(scripts(), function (e) {
                                if (head || (head = e.parentNode), dataMain = e.getAttribute('data-main'))
                                    return mainScript = dataMain, cfg.baseUrl || (src = mainScript.split('/'), mainScript = src.pop(), subPath = src.length ? src.join('/') + '/' : './', cfg.baseUrl = subPath), mainScript = mainScript.replace(jsSuffixRegExp, ''), req.jsExtRegExp.test(mainScript) && (mainScript = dataMain), cfg.deps = cfg.deps ? cfg.deps.concat(mainScript) : [mainScript], !0;
                            }), define = function (e, t, n) {
                                var i, r;
                                'string' != typeof e && (n = t, t = e, e = null), isArray(t) || (n = t, t = null), !t && isFunction(n) && (t = [], n.length && (n.toString().replace(commentRegExp, '').replace(cjsRequireRegExp, function (e, n) {
                                    t.push(n);
                                }), t = (1 === n.length ? ['require'] : [
                                    'require',
                                    'exports',
                                    'module'
                                ]).concat(t))), useInteractive && (i = currentlyAddingScript || getInteractiveScript(), i && (e || (e = i.getAttribute('data-requiremodule')), r = contexts[i.getAttribute('data-requirecontext')])), r ? (r.defQueue.push([
                                    e,
                                    t,
                                    n
                                ]), r.defQueueMap[e] = !0) : globalDefQueue.push([
                                    e,
                                    t,
                                    n
                                ]);
                            }, define.amd = { jQuery: !0 }, req.exec = function (text) {
                                return eval(text);
                            }, req(cfg);
                        }
                    }(this), CKFinder.requirejs = requirejs, CKFinder.require = require, CKFinder.define = define;
                }
            }(), CKFinder.define('requireLib', function () {
            }), function () {
                function e(e, t, n) {
                    for (var i = (n || 0) - 1, r = e ? e.length : 0; ++i < r;)
                        if (e[i] === t)
                            return i;
                    return -1;
                }
                function t(t, n) {
                    var i = typeof n;
                    if (t = t.cache, 'boolean' == i || null == n)
                        return t[n] ? 0 : -1;
                    'number' != i && 'string' != i && (i = 'object');
                    var r = 'number' == i ? n : m + n;
                    return t = (t = t[i]) && t[r], 'object' == i ? t && e(t, n) > -1 ? 0 : -1 : t ? 0 : -1;
                }
                function n(e) {
                    var t = this.cache, n = typeof e;
                    if ('boolean' == n || null == e)
                        t[e] = !0;
                    else {
                        'number' != n && 'string' != n && (n = 'object');
                        var i = 'number' == n ? e : m + e, r = t[n] || (t[n] = {});
                        'object' == n ? (r[i] || (r[i] = [])).push(e) : r[i] = !0;
                    }
                }
                function i(e) {
                    return e.charCodeAt(0);
                }
                function r(e, t) {
                    for (var n = e.criteria, i = t.criteria, r = -1, o = n.length; ++r < o;) {
                        var s = n[r], a = i[r];
                        if (s !== a) {
                            if (s > a || 'undefined' == typeof s)
                                return 1;
                            if (s < a || 'undefined' == typeof a)
                                return -1;
                        }
                    }
                    return e.index - t.index;
                }
                function o(e) {
                    var t = -1, i = e.length, r = e[0], o = e[i / 2 | 0], s = e[i - 1];
                    if (r && 'object' == typeof r && o && 'object' == typeof o && s && 'object' == typeof s)
                        return !1;
                    var a = l();
                    a['false'] = a['null'] = a['true'] = a.undefined = !1;
                    var u = l();
                    for (u.array = e, u.cache = a, u.push = n; ++t < i;)
                        u.push(e[t]);
                    return u;
                }
                function s(e) {
                    return '\\' + z[e];
                }
                function a() {
                    return g.pop() || [];
                }
                function l() {
                    return p.pop() || {
                        array: null,
                        cache: null,
                        criteria: null,
                        false: !1,
                        index: 0,
                        null: !1,
                        number: null,
                        object: null,
                        push: null,
                        string: null,
                        true: !1,
                        undefined: !1,
                        value: null
                    };
                }
                function u(e) {
                    e.length = 0, g.length < y && g.push(e);
                }
                function c(e) {
                    var t = e.cache;
                    t && c(t), e.array = e.cache = e.criteria = e.object = e.number = e.string = e.value = null, p.length < y && p.push(e);
                }
                function d(e, t, n) {
                    t || (t = 0), 'undefined' == typeof n && (n = e ? e.length : 0);
                    for (var i = -1, r = n - t || 0, o = Array(r < 0 ? 0 : r); ++i < r;)
                        o[i] = e[t + i];
                    return o;
                }
                function f(n) {
                    function g(e) {
                        return e && 'object' == typeof e && !jn(e) && Bn.call(e, '__wrapped__') ? e : new p(e);
                    }
                    function p(e, t) {
                        this.__chain__ = !!t, this.__wrapped__ = e;
                    }
                    function y(e) {
                        function t() {
                            if (i) {
                                var e = d(i);
                                Vn.apply(e, arguments);
                            }
                            if (this instanceof t) {
                                var o = G(n.prototype), s = n.apply(o, e || arguments);
                                return Pe(s) ? s : o;
                            }
                            return n.apply(r, e || arguments);
                        }
                        var n = e[0], i = e[2], r = e[4];
                        return Jn(t, e), t;
                    }
                    function z(e, t, n, i, r) {
                        if (n) {
                            var o = n(e);
                            if ('undefined' != typeof o)
                                return o;
                        }
                        var s = Pe(e);
                        if (!s)
                            return e;
                        var l = Tn.call(e);
                        if (!X[l])
                            return e;
                        var c = Gn[l];
                        switch (l) {
                        case K:
                        case N:
                            return new c(+e);
                        case L:
                        case q:
                            return new c(e);
                        case W:
                            return o = c(e.source, F.exec(e)), o.lastIndex = e.lastIndex, o;
                        }
                        var f = jn(e);
                        if (t) {
                            var h = !i;
                            i || (i = a()), r || (r = a());
                            for (var g = i.length; g--;)
                                if (i[g] == e)
                                    return r[g];
                            o = f ? c(e.length) : {};
                        } else
                            o = f ? d(e) : si({}, e);
                        return f && (Bn.call(e, 'index') && (o.index = e.index), Bn.call(e, 'input') && (o.input = e.input)), t ? (i.push(e), r.push(o), (f ? Qe : ui)(e, function (e, s) {
                            o[s] = z(e, t, n, i, r);
                        }), h && (u(i), u(r)), o) : o;
                    }
                    function G(e, t) {
                        return Pe(e) ? Hn(e) : {};
                    }
                    function Q(e, t, n) {
                        if ('function' != typeof e)
                            return Jt;
                        if ('undefined' == typeof t || !('prototype' in e))
                            return e;
                        var i = e.__bindData__;
                        if ('undefined' == typeof i && (Qn.funcNames && (i = !e.name), i = i || !Qn.funcDecomp, !i)) {
                            var r = On.call(e);
                            Qn.funcNames || (i = !M.test(r)), i || (i = P.test(r), Jn(e, i));
                        }
                        if (i === !1 || i !== !0 && 1 & i[1])
                            return e;
                        switch (n) {
                        case 1:
                            return function (n) {
                                return e.call(t, n);
                            };
                        case 2:
                            return function (n, i) {
                                return e.call(t, n, i);
                            };
                        case 3:
                            return function (n, i, r) {
                                return e.call(t, n, i, r);
                            };
                        case 4:
                            return function (n, i, r, o) {
                                return e.call(t, n, i, r, o);
                            };
                        }
                        return Bt(e, t);
                    }
                    function J(e) {
                        function t() {
                            var e = l ? s : this;
                            if (r) {
                                var h = d(r);
                                Vn.apply(h, arguments);
                            }
                            if ((o || c) && (h || (h = d(arguments)), o && Vn.apply(h, o), c && h.length < a))
                                return i |= 16, J([
                                    n,
                                    f ? i : i & -4,
                                    h,
                                    null,
                                    s,
                                    a
                                ]);
                            if (h || (h = arguments), u && (n = e[S]), this instanceof t) {
                                e = G(n.prototype);
                                var g = n.apply(e, h);
                                return Pe(g) ? g : e;
                            }
                            return n.apply(e, h);
                        }
                        var n = e[0], i = e[1], r = e[2], o = e[3], s = e[4], a = e[5], l = 1 & i, u = 2 & i, c = 4 & i, f = 8 & i, S = n;
                        return Jn(t, e), t;
                    }
                    function j(n, i) {
                        var r = -1, s = ue(), a = n ? n.length : 0, l = a >= w && s === e, u = [];
                        if (l) {
                            var d = o(i);
                            d ? (s = t, i = d) : l = !1;
                        }
                        for (; ++r < a;) {
                            var f = n[r];
                            s(i, f) < 0 && u.push(f);
                        }
                        return l && c(i), u;
                    }
                    function te(e, t, n, i) {
                        for (var r = (i || 0) - 1, o = e ? e.length : 0, s = []; ++r < o;) {
                            var a = e[r];
                            if (a && 'object' == typeof a && 'number' == typeof a.length && (jn(a) || Se(a))) {
                                t || (a = te(a, t, n));
                                var l = -1, u = a.length, c = s.length;
                                for (s.length += u; ++l < u;)
                                    s[c++] = a[l];
                            } else
                                n || s.push(a);
                        }
                        return s;
                    }
                    function ne(e, t, n, i, r, o) {
                        if (n) {
                            var s = n(e, t);
                            if ('undefined' != typeof s)
                                return !!s;
                        }
                        if (e === t)
                            return 0 !== e || 1 / e == 1 / t;
                        var l = typeof e, c = typeof t;
                        if (!(e !== e || e && Y[l] || t && Y[c]))
                            return !1;
                        if (null == e || null == t)
                            return e === t;
                        var d = Tn.call(e), f = Tn.call(t);
                        if (d == B && (d = H), f == B && (f = H), d != f)
                            return !1;
                        switch (d) {
                        case K:
                        case N:
                            return +e == +t;
                        case L:
                            return e != +e ? t != +t : 0 == e ? 1 / e == 1 / t : e == +t;
                        case W:
                        case q:
                            return e == xn(t);
                        }
                        var h = d == V;
                        if (!h) {
                            var g = Bn.call(e, '__wrapped__'), p = Bn.call(t, '__wrapped__');
                            if (g || p)
                                return ne(g ? e.__wrapped__ : e, p ? t.__wrapped__ : t, n, i, r, o);
                            if (d != H)
                                return !1;
                            var v = e.constructor, m = t.constructor;
                            if (v != m && !(Re(v) && v instanceof v && Re(m) && m instanceof m) && 'constructor' in e && 'constructor' in t)
                                return !1;
                        }
                        var w = !r;
                        r || (r = a()), o || (o = a());
                        for (var y = r.length; y--;)
                            if (r[y] == e)
                                return o[y] == t;
                        var C = 0;
                        if (s = !0, r.push(e), o.push(t), h) {
                            if (y = e.length, C = t.length, s = C == y, s || i)
                                for (; C--;) {
                                    var b = y, x = t[C];
                                    if (i)
                                        for (; b-- && !(s = ne(e[b], x, n, i, r, o)););
                                    else if (!(s = ne(e[C], x, n, i, r, o)))
                                        break;
                                }
                        } else
                            li(t, function (t, a, l) {
                                if (Bn.call(l, a))
                                    return C++, s = Bn.call(e, a) && ne(e[a], t, n, i, r, o);
                            }), s && !i && li(e, function (e, t, n) {
                                if (Bn.call(n, t))
                                    return s = --C > -1;
                            });
                        return r.pop(), o.pop(), w && (u(r), u(o)), s;
                    }
                    function ie(e, t, n, i, r) {
                        (jn(t) ? Qe : ui)(t, function (t, o) {
                            var s, a, l = t, u = e[o];
                            if (t && ((a = jn(t)) || ci(t))) {
                                for (var c = i.length; c--;)
                                    if (s = i[c] == t) {
                                        u = r[c];
                                        break;
                                    }
                                if (!s) {
                                    var d;
                                    n && (l = n(u, t), (d = 'undefined' != typeof l) && (u = l)), d || (u = a ? jn(u) ? u : [] : ci(u) ? u : {}), i.push(t), r.push(u), d || ie(u, t, n, i, r);
                                }
                            } else
                                n && (l = n(u, t), 'undefined' == typeof l && (l = t)), 'undefined' != typeof l && (u = l);
                            e[o] = u;
                        });
                    }
                    function re(e, t) {
                        return e + An(Zn() * (t - e + 1));
                    }
                    function oe(n, i, r) {
                        var s = -1, l = ue(), d = n ? n.length : 0, f = [], S = !i && d >= w && l === e, h = r || S ? a() : f;
                        if (S) {
                            var g = o(h);
                            l = t, h = g;
                        }
                        for (; ++s < d;) {
                            var p = n[s], v = r ? r(p, s, n) : p;
                            (i ? !s || h[h.length - 1] !== v : l(h, v) < 0) && ((r || S) && h.push(v), f.push(p));
                        }
                        return S ? (u(h.array), c(h)) : r && u(h), f;
                    }
                    function se(e) {
                        return function (t, n, i) {
                            var r = {};
                            n = g.createCallback(n, i, 3);
                            var o = -1, s = t ? t.length : 0;
                            if ('number' == typeof s)
                                for (; ++o < s;) {
                                    var a = t[o];
                                    e(r, a, n(a, o, t), t);
                                }
                            else
                                ui(t, function (t, i, o) {
                                    e(r, t, n(t, i, o), o);
                                });
                            return r;
                        };
                    }
                    function ae(e, t, n, i, r, o) {
                        var s = 1 & t, a = 2 & t, l = 4 & t, u = 16 & t, c = 32 & t;
                        if (!a && !Re(e))
                            throw new En();
                        u && !n.length && (t &= -17, u = n = !1), c && !i.length && (t &= -33, c = i = !1);
                        var f = e && e.__bindData__;
                        if (f && f !== !0)
                            return f = d(f), f[2] && (f[2] = d(f[2])), f[3] && (f[3] = d(f[3])), !s || 1 & f[1] || (f[4] = r), !s && 1 & f[1] && (t |= 8), !l || 4 & f[1] || (f[5] = o), u && Vn.apply(f[2] || (f[2] = []), n), c && Un.apply(f[3] || (f[3] = []), i), f[1] |= t, ae.apply(null, f);
                        var S = 1 == t || 17 === t ? y : J;
                        return S([
                            e,
                            t,
                            n,
                            i,
                            r,
                            o
                        ]);
                    }
                    function le(e) {
                        return ni[e];
                    }
                    function ue() {
                        var t = (t = g.indexOf) === mt ? e : t;
                        return t;
                    }
                    function ce(e) {
                        return 'function' == typeof e && In.test(e);
                    }
                    function de(e) {
                        var t, n;
                        return !!(e && Tn.call(e) == H && (t = e.constructor, !Re(t) || t instanceof t)) && (li(e, function (e, t) {
                            n = t;
                        }), 'undefined' == typeof n || Bn.call(e, n));
                    }
                    function fe(e) {
                        return ii[e];
                    }
                    function Se(e) {
                        return e && 'object' == typeof e && 'number' == typeof e.length && Tn.call(e) == B || !1;
                    }
                    function he(e, t, n, i) {
                        return 'boolean' != typeof t && null != t && (i = n, n = t, t = !1), z(e, t, 'function' == typeof n && Q(n, i, 1));
                    }
                    function ge(e, t, n) {
                        return z(e, !0, 'function' == typeof t && Q(t, n, 1));
                    }
                    function pe(e, t) {
                        var n = G(e);
                        return t ? si(n, t) : n;
                    }
                    function ve(e, t, n) {
                        var i;
                        return t = g.createCallback(t, n, 3), ui(e, function (e, n, r) {
                            if (t(e, n, r))
                                return i = n, !1;
                        }), i;
                    }
                    function me(e, t, n) {
                        var i;
                        return t = g.createCallback(t, n, 3), ye(e, function (e, n, r) {
                            if (t(e, n, r))
                                return i = n, !1;
                        }), i;
                    }
                    function we(e, t, n) {
                        var i = [];
                        li(e, function (e, t) {
                            i.push(t, e);
                        });
                        var r = i.length;
                        for (t = Q(t, n, 3); r-- && t(i[r--], i[r], e) !== !1;);
                        return e;
                    }
                    function ye(e, t, n) {
                        var i = ti(e), r = i.length;
                        for (t = Q(t, n, 3); r--;) {
                            var o = i[r];
                            if (t(e[o], o, e) === !1)
                                break;
                        }
                        return e;
                    }
                    function Ce(e) {
                        var t = [];
                        return li(e, function (e, n) {
                            Re(e) && t.push(n);
                        }), t.sort();
                    }
                    function be(e, t) {
                        return !!e && Bn.call(e, t);
                    }
                    function xe(e) {
                        for (var t = -1, n = ti(e), i = n.length, r = {}; ++t < i;) {
                            var o = n[t];
                            r[e[o]] = o;
                        }
                        return r;
                    }
                    function Ee(e) {
                        return e === !0 || e === !1 || e && 'object' == typeof e && Tn.call(e) == K || !1;
                    }
                    function _e(e) {
                        return e && 'object' == typeof e && Tn.call(e) == N || !1;
                    }
                    function Fe(e) {
                        return e && 1 === e.nodeType || !1;
                    }
                    function Me(e) {
                        var t = !0;
                        if (!e)
                            return t;
                        var n = Tn.call(e), i = e.length;
                        return n == V || n == q || n == B || n == H && 'number' == typeof i && Re(e.splice) ? !i : (ui(e, function () {
                            return t = !1;
                        }), t);
                    }
                    function Te(e, t, n, i) {
                        return ne(e, t, 'function' == typeof n && Q(n, i, 2));
                    }
                    function Ie(e) {
                        return qn(e) && !Xn(parseFloat(e));
                    }
                    function Re(e) {
                        return 'function' == typeof e;
                    }
                    function Pe(e) {
                        return !(!e || !Y[typeof e]);
                    }
                    function Ae(e) {
                        return De(e) && e != +e;
                    }
                    function Oe(e) {
                        return null === e;
                    }
                    function De(e) {
                        return 'number' == typeof e || e && 'object' == typeof e && Tn.call(e) == L || !1;
                    }
                    function Be(e) {
                        return e && 'object' == typeof e && Tn.call(e) == W || !1;
                    }
                    function Ve(e) {
                        return 'string' == typeof e || e && 'object' == typeof e && Tn.call(e) == q || !1;
                    }
                    function Ke(e) {
                        return 'undefined' == typeof e;
                    }
                    function Ne(e, t, n) {
                        var i = {};
                        return t = g.createCallback(t, n, 3), ui(e, function (e, n, r) {
                            i[n] = t(e, n, r);
                        }), i;
                    }
                    function Ue(e) {
                        var t = arguments, n = 2;
                        if (!Pe(e))
                            return e;
                        if ('number' != typeof t[2] && (n = t.length), n > 3 && 'function' == typeof t[n - 2])
                            var i = Q(t[--n - 1], t[n--], 2);
                        else
                            n > 2 && 'function' == typeof t[n - 1] && (i = t[--n]);
                        for (var r = d(arguments, 1, n), o = -1, s = a(), l = a(); ++o < n;)
                            ie(e, r[o], i, s, l);
                        return u(s), u(l), e;
                    }
                    function Le(e, t, n) {
                        var i = {};
                        if ('function' != typeof t) {
                            var r = [];
                            li(e, function (e, t) {
                                r.push(t);
                            }), r = j(r, te(arguments, !0, !1, 1));
                            for (var o = -1, s = r.length; ++o < s;) {
                                var a = r[o];
                                i[a] = e[a];
                            }
                        } else
                            t = g.createCallback(t, n, 3), li(e, function (e, n, r) {
                                t(e, n, r) || (i[n] = e);
                            });
                        return i;
                    }
                    function He(e) {
                        for (var t = -1, n = ti(e), i = n.length, r = gn(i); ++t < i;) {
                            var o = n[t];
                            r[t] = [
                                o,
                                e[o]
                            ];
                        }
                        return r;
                    }
                    function We(e, t, n) {
                        var i = {};
                        if ('function' != typeof t)
                            for (var r = -1, o = te(arguments, !0, !1, 1), s = Pe(e) ? o.length : 0; ++r < s;) {
                                var a = o[r];
                                a in e && (i[a] = e[a]);
                            }
                        else
                            t = g.createCallback(t, n, 3), li(e, function (e, n, r) {
                                t(e, n, r) && (i[n] = e);
                            });
                        return i;
                    }
                    function qe(e, t, n, i) {
                        var r = jn(e);
                        if (null == n)
                            if (r)
                                n = [];
                            else {
                                var o = e && e.constructor, s = o && o.prototype;
                                n = G(s);
                            }
                        return t && (t = g.createCallback(t, i, 4), (r ? Qe : ui)(e, function (e, i, r) {
                            return t(n, e, i, r);
                        })), n;
                    }
                    function Xe(e) {
                        for (var t = -1, n = ti(e), i = n.length, r = gn(i); ++t < i;)
                            r[t] = e[n[t]];
                        return r;
                    }
                    function ke(e) {
                        for (var t = arguments, n = -1, i = te(t, !0, !1, 1), r = t[2] && t[2][t[1]] === e ? 1 : i.length, o = gn(r); ++n < r;)
                            o[n] = e[i[n]];
                        return o;
                    }
                    function $e(e, t, n) {
                        var i = -1, r = ue(), o = e ? e.length : 0, s = !1;
                        return n = (n < 0 ? $n(0, o + n) : n) || 0, jn(e) ? s = r(e, t, n) > -1 : 'number' == typeof o ? s = (Ve(e) ? e.indexOf(t, n) : r(e, t, n)) > -1 : ui(e, function (e) {
                            if (++i >= n)
                                return !(s = e === t);
                        }), s;
                    }
                    function Ye(e, t, n) {
                        var i = !0;
                        t = g.createCallback(t, n, 3);
                        var r = -1, o = e ? e.length : 0;
                        if ('number' == typeof o)
                            for (; ++r < o && (i = !!t(e[r], r, e)););
                        else
                            ui(e, function (e, n, r) {
                                return i = !!t(e, n, r);
                            });
                        return i;
                    }
                    function ze(e, t, n) {
                        var i = [];
                        t = g.createCallback(t, n, 3);
                        var r = -1, o = e ? e.length : 0;
                        if ('number' == typeof o)
                            for (; ++r < o;) {
                                var s = e[r];
                                t(s, r, e) && i.push(s);
                            }
                        else
                            ui(e, function (e, n, r) {
                                t(e, n, r) && i.push(e);
                            });
                        return i;
                    }
                    function Ze(e, t, n) {
                        t = g.createCallback(t, n, 3);
                        var i = -1, r = e ? e.length : 0;
                        if ('number' != typeof r) {
                            var o;
                            return ui(e, function (e, n, i) {
                                if (t(e, n, i))
                                    return o = e, !1;
                            }), o;
                        }
                        for (; ++i < r;) {
                            var s = e[i];
                            if (t(s, i, e))
                                return s;
                        }
                    }
                    function Ge(e, t, n) {
                        var i;
                        return t = g.createCallback(t, n, 3), Je(e, function (e, n, r) {
                            if (t(e, n, r))
                                return i = e, !1;
                        }), i;
                    }
                    function Qe(e, t, n) {
                        var i = -1, r = e ? e.length : 0;
                        if (t = t && 'undefined' == typeof n ? t : Q(t, n, 3), 'number' == typeof r)
                            for (; ++i < r && t(e[i], i, e) !== !1;);
                        else
                            ui(e, t);
                        return e;
                    }
                    function Je(e, t, n) {
                        var i = e ? e.length : 0;
                        if (t = t && 'undefined' == typeof n ? t : Q(t, n, 3), 'number' == typeof i)
                            for (; i-- && t(e[i], i, e) !== !1;);
                        else {
                            var r = ti(e);
                            i = r.length, ui(e, function (e, n, o) {
                                return n = r ? r[--i] : --i, t(o[n], n, o);
                            });
                        }
                        return e;
                    }
                    function je(e, t) {
                        var n = d(arguments, 2), i = -1, r = 'function' == typeof t, o = e ? e.length : 0, s = gn('number' == typeof o ? o : 0);
                        return Qe(e, function (e) {
                            s[++i] = (r ? t : e[t]).apply(e, n);
                        }), s;
                    }
                    function et(e, t, n) {
                        var i = -1, r = e ? e.length : 0;
                        if (t = g.createCallback(t, n, 3), 'number' == typeof r)
                            for (var o = gn(r); ++i < r;)
                                o[i] = t(e[i], i, e);
                        else
                            o = [], ui(e, function (e, n, r) {
                                o[++i] = t(e, n, r);
                            });
                        return o;
                    }
                    function tt(e, t, n) {
                        var r = -(1 / 0), o = r;
                        if ('function' != typeof t && n && n[t] === e && (t = null), null == t && jn(e))
                            for (var s = -1, a = e.length; ++s < a;) {
                                var l = e[s];
                                l > o && (o = l);
                            }
                        else
                            t = null == t && Ve(e) ? i : g.createCallback(t, n, 3), Qe(e, function (e, n, i) {
                                var s = t(e, n, i);
                                s > r && (r = s, o = e);
                            });
                        return o;
                    }
                    function nt(e, t, n) {
                        var r = 1 / 0, o = r;
                        if ('function' != typeof t && n && n[t] === e && (t = null), null == t && jn(e))
                            for (var s = -1, a = e.length; ++s < a;) {
                                var l = e[s];
                                l < o && (o = l);
                            }
                        else
                            t = null == t && Ve(e) ? i : g.createCallback(t, n, 3), Qe(e, function (e, n, i) {
                                var s = t(e, n, i);
                                s < r && (r = s, o = e);
                            });
                        return o;
                    }
                    function it(e, t, n, i) {
                        if (!e)
                            return n;
                        var r = arguments.length < 3;
                        t = g.createCallback(t, i, 4);
                        var o = -1, s = e.length;
                        if ('number' == typeof s)
                            for (r && (n = e[++o]); ++o < s;)
                                n = t(n, e[o], o, e);
                        else
                            ui(e, function (e, i, o) {
                                n = r ? (r = !1, e) : t(n, e, i, o);
                            });
                        return n;
                    }
                    function rt(e, t, n, i) {
                        var r = arguments.length < 3;
                        return t = g.createCallback(t, i, 4), Je(e, function (e, i, o) {
                            n = r ? (r = !1, e) : t(n, e, i, o);
                        }), n;
                    }
                    function ot(e, t, n) {
                        return t = g.createCallback(t, n, 3), ze(e, function (e, n, i) {
                            return !t(e, n, i);
                        });
                    }
                    function st(e, t, n) {
                        if (e && 'number' != typeof e.length && (e = Xe(e)), null == t || n)
                            return e ? e[re(0, e.length - 1)] : h;
                        var i = at(e);
                        return i.length = Yn($n(0, t), i.length), i;
                    }
                    function at(e) {
                        var t = -1, n = e ? e.length : 0, i = gn('number' == typeof n ? n : 0);
                        return Qe(e, function (e) {
                            var n = re(0, ++t);
                            i[t] = i[n], i[n] = e;
                        }), i;
                    }
                    function lt(e) {
                        var t = e ? e.length : 0;
                        return 'number' == typeof t ? t : ti(e).length;
                    }
                    function ut(e, t, n) {
                        var i;
                        t = g.createCallback(t, n, 3);
                        var r = -1, o = e ? e.length : 0;
                        if ('number' == typeof o)
                            for (; ++r < o && !(i = t(e[r], r, e)););
                        else
                            ui(e, function (e, n, r) {
                                return !(i = t(e, n, r));
                            });
                        return !!i;
                    }
                    function ct(e, t, n) {
                        var i = -1, o = jn(t), s = e ? e.length : 0, d = gn('number' == typeof s ? s : 0);
                        for (o || (t = g.createCallback(t, n, 3)), Qe(e, function (e, n, r) {
                                var s = d[++i] = l();
                                o ? s.criteria = et(t, function (t) {
                                    return e[t];
                                }) : (s.criteria = a())[0] = t(e, n, r), s.index = i, s.value = e;
                            }), s = d.length, d.sort(r); s--;) {
                            var f = d[s];
                            d[s] = f.value, o || u(f.criteria), c(f);
                        }
                        return d;
                    }
                    function dt(e) {
                        return e && 'number' == typeof e.length ? d(e) : Xe(e);
                    }
                    function ft(e) {
                        for (var t = -1, n = e ? e.length : 0, i = []; ++t < n;) {
                            var r = e[t];
                            r && i.push(r);
                        }
                        return i;
                    }
                    function St(e) {
                        return j(e, te(arguments, !0, !0, 1));
                    }
                    function ht(e, t, n) {
                        var i = -1, r = e ? e.length : 0;
                        for (t = g.createCallback(t, n, 3); ++i < r;)
                            if (t(e[i], i, e))
                                return i;
                        return -1;
                    }
                    function gt(e, t, n) {
                        var i = e ? e.length : 0;
                        for (t = g.createCallback(t, n, 3); i--;)
                            if (t(e[i], i, e))
                                return i;
                        return -1;
                    }
                    function pt(e, t, n) {
                        var i = 0, r = e ? e.length : 0;
                        if ('number' != typeof t && null != t) {
                            var o = -1;
                            for (t = g.createCallback(t, n, 3); ++o < r && t(e[o], o, e);)
                                i++;
                        } else if (i = t, null == i || n)
                            return e ? e[0] : h;
                        return d(e, 0, Yn($n(0, i), r));
                    }
                    function vt(e, t, n, i) {
                        return 'boolean' != typeof t && null != t && (i = n, n = 'function' != typeof t && i && i[t] === e ? null : t, t = !1), null != n && (e = et(e, n, i)), te(e, t);
                    }
                    function mt(t, n, i) {
                        if ('number' == typeof i) {
                            var r = t ? t.length : 0;
                            i = i < 0 ? $n(0, r + i) : i || 0;
                        } else if (i) {
                            var o = Mt(t, n);
                            return t[o] === n ? o : -1;
                        }
                        return e(t, n, i);
                    }
                    function wt(e, t, n) {
                        var i = 0, r = e ? e.length : 0;
                        if ('number' != typeof t && null != t) {
                            var o = r;
                            for (t = g.createCallback(t, n, 3); o-- && t(e[o], o, e);)
                                i++;
                        } else
                            i = null == t || n ? 1 : t || i;
                        return d(e, 0, Yn($n(0, r - i), r));
                    }
                    function yt() {
                        for (var n = [], i = -1, r = arguments.length, s = a(), l = ue(), d = l === e, f = a(); ++i < r;) {
                            var S = arguments[i];
                            (jn(S) || Se(S)) && (n.push(S), s.push(d && S.length >= w && o(i ? n[i] : f)));
                        }
                        var h = n[0], g = -1, p = h ? h.length : 0, v = [];
                        e:
                            for (; ++g < p;) {
                                var m = s[0];
                                if (S = h[g], (m ? t(m, S) : l(f, S)) < 0) {
                                    for (i = r, (m || f).push(S); --i;)
                                        if (m = s[i], (m ? t(m, S) : l(n[i], S)) < 0)
                                            continue e;
                                    v.push(S);
                                }
                            }
                        for (; r--;)
                            m = s[r], m && c(m);
                        return u(s), u(f), v;
                    }
                    function Ct(e, t, n) {
                        var i = 0, r = e ? e.length : 0;
                        if ('number' != typeof t && null != t) {
                            var o = r;
                            for (t = g.createCallback(t, n, 3); o-- && t(e[o], o, e);)
                                i++;
                        } else if (i = t, null == i || n)
                            return e ? e[r - 1] : h;
                        return d(e, $n(0, r - i));
                    }
                    function bt(e, t, n) {
                        var i = e ? e.length : 0;
                        for ('number' == typeof n && (i = (n < 0 ? $n(0, i + n) : Yn(n, i - 1)) + 1); i--;)
                            if (e[i] === t)
                                return i;
                        return -1;
                    }
                    function xt(e) {
                        for (var t = arguments, n = 0, i = t.length, r = e ? e.length : 0; ++n < i;)
                            for (var o = -1, s = t[n]; ++o < r;)
                                e[o] === s && (Nn.call(e, o--, 1), r--);
                        return e;
                    }
                    function Et(e, t, n) {
                        e = +e || 0, n = 'number' == typeof n ? n : +n || 1, null == t && (t = e, e = 0);
                        for (var i = -1, r = $n(0, Rn((t - e) / (n || 1))), o = gn(r); ++i < r;)
                            o[i] = e, e += n;
                        return o;
                    }
                    function _t(e, t, n) {
                        var i = -1, r = e ? e.length : 0, o = [];
                        for (t = g.createCallback(t, n, 3); ++i < r;) {
                            var s = e[i];
                            t(s, i, e) && (o.push(s), Nn.call(e, i--, 1), r--);
                        }
                        return o;
                    }
                    function Ft(e, t, n) {
                        if ('number' != typeof t && null != t) {
                            var i = 0, r = -1, o = e ? e.length : 0;
                            for (t = g.createCallback(t, n, 3); ++r < o && t(e[r], r, e);)
                                i++;
                        } else
                            i = null == t || n ? 1 : $n(0, t);
                        return d(e, i);
                    }
                    function Mt(e, t, n, i) {
                        var r = 0, o = e ? e.length : r;
                        for (n = n ? g.createCallback(n, i, 1) : Jt, t = n(t); r < o;) {
                            var s = r + o >>> 1;
                            n(e[s]) < t ? r = s + 1 : o = s;
                        }
                        return r;
                    }
                    function Tt() {
                        return oe(te(arguments, !0, !0));
                    }
                    function It(e, t, n, i) {
                        return 'boolean' != typeof t && null != t && (i = n, n = 'function' != typeof t && i && i[t] === e ? null : t, t = !1), null != n && (n = g.createCallback(n, i, 3)), oe(e, t, n);
                    }
                    function Rt(e) {
                        return j(e, d(arguments, 1));
                    }
                    function Pt() {
                        for (var e = -1, t = arguments.length; ++e < t;) {
                            var n = arguments[e];
                            if (jn(n) || Se(n))
                                var i = i ? oe(j(i, n).concat(j(n, i))) : n;
                        }
                        return i || [];
                    }
                    function At() {
                        for (var e = arguments.length > 1 ? arguments : arguments[0], t = -1, n = e ? tt(hi(e, 'length')) : 0, i = gn(n < 0 ? 0 : n); ++t < n;)
                            i[t] = hi(e, t);
                        return i;
                    }
                    function Ot(e, t) {
                        var n = -1, i = e ? e.length : 0, r = {};
                        for (t || !i || jn(e[0]) || (t = []); ++n < i;) {
                            var o = e[n];
                            t ? r[o] = t[n] : o && (r[o[0]] = o[1]);
                        }
                        return r;
                    }
                    function Dt(e, t) {
                        if (!Re(t))
                            throw new En();
                        return function () {
                            if (--e < 1)
                                return t.apply(this, arguments);
                        };
                    }
                    function Bt(e, t) {
                        return arguments.length > 2 ? ae(e, 17, d(arguments, 2), null, t) : ae(e, 1, null, null, t);
                    }
                    function Vt(e) {
                        for (var t = arguments.length > 1 ? te(arguments, !0, !1, 1) : Ce(e), n = -1, i = t.length; ++n < i;) {
                            var r = t[n];
                            e[r] = ae(e[r], 1, null, null, e);
                        }
                        return e;
                    }
                    function Kt(e, t) {
                        return arguments.length > 2 ? ae(t, 19, d(arguments, 2), null, e) : ae(t, 3, null, null, e);
                    }
                    function Nt() {
                        for (var e = arguments, t = e.length; t--;)
                            if (!Re(e[t]))
                                throw new En();
                        return function () {
                            for (var t = arguments, n = e.length; n--;)
                                t = [e[n].apply(this, t)];
                            return t[0];
                        };
                    }
                    function Ut(e, t) {
                        return t = 'number' == typeof t ? t : +t || e.length, ae(e, 4, null, null, null, t);
                    }
                    function Lt(e, t, n) {
                        var i, r, o, s, a, l, u, c = 0, d = !1, f = !0;
                        if (!Re(e))
                            throw new En();
                        if (t = $n(0, t) || 0, n === !0) {
                            var g = !0;
                            f = !1;
                        } else
                            Pe(n) && (g = n.leading, d = 'maxWait' in n && ($n(t, n.maxWait) || 0), f = 'trailing' in n ? n.trailing : f);
                        var p = function () {
                                var n = t - (pi() - s);
                                if (n <= 0) {
                                    r && Pn(r);
                                    var d = u;
                                    r = l = u = h, d && (c = pi(), o = e.apply(a, i), l || r || (i = a = null));
                                } else
                                    l = Kn(p, n);
                            }, v = function () {
                                l && Pn(l), r = l = u = h, (f || d !== t) && (c = pi(), o = e.apply(a, i), l || r || (i = a = null));
                            };
                        return function () {
                            if (i = arguments, s = pi(), a = this, u = f && (l || !g), d === !1)
                                var n = g && !l;
                            else {
                                r || g || (c = s);
                                var S = d - (s - c), h = S <= 0;
                                h ? (r && (r = Pn(r)), c = s, o = e.apply(a, i)) : r || (r = Kn(v, S));
                            }
                            return h && l ? l = Pn(l) : l || t === d || (l = Kn(p, t)), n && (h = !0, o = e.apply(a, i)), !h || l || r || (i = a = null), o;
                        };
                    }
                    function Ht(e) {
                        if (!Re(e))
                            throw new En();
                        var t = d(arguments, 1);
                        return Kn(function () {
                            e.apply(h, t);
                        }, 1);
                    }
                    function Wt(e, t) {
                        if (!Re(e))
                            throw new En();
                        var n = d(arguments, 2);
                        return Kn(function () {
                            e.apply(h, n);
                        }, t);
                    }
                    function qt(e, t) {
                        if (!Re(e))
                            throw new En();
                        var n = function () {
                            var i = n.cache, r = t ? t.apply(this, arguments) : m + arguments[0];
                            return Bn.call(i, r) ? i[r] : i[r] = e.apply(this, arguments);
                        };
                        return n.cache = {}, n;
                    }
                    function Xt(e) {
                        var t, n;
                        if (!Re(e))
                            throw new En();
                        return function () {
                            return t ? n : (t = !0, n = e.apply(this, arguments), e = null, n);
                        };
                    }
                    function kt(e) {
                        return ae(e, 16, d(arguments, 1));
                    }
                    function $t(e) {
                        return ae(e, 32, null, d(arguments, 1));
                    }
                    function Yt(e, t, n) {
                        var i = !0, r = !0;
                        if (!Re(e))
                            throw new En();
                        return n === !1 ? i = !1 : Pe(n) && (i = 'leading' in n ? n.leading : i, r = 'trailing' in n ? n.trailing : r), k.leading = i, k.maxWait = t, k.trailing = r, Lt(e, t, k);
                    }
                    function zt(e, t) {
                        return ae(t, 16, [e]);
                    }
                    function Zt(e) {
                        return function () {
                            return e;
                        };
                    }
                    function Gt(e, t, n) {
                        var i = typeof e;
                        if (null == e || 'function' == i)
                            return Q(e, t, n);
                        if ('object' != i)
                            return nn(e);
                        var r = ti(e), o = r[0], s = e[o];
                        return 1 != r.length || s !== s || Pe(s) ? function (t) {
                            for (var n = r.length, i = !1; n-- && (i = ne(t[r[n]], e[r[n]], null, !0)););
                            return i;
                        } : function (e) {
                            var t = e[o];
                            return s === t && (0 !== s || 1 / s == 1 / t);
                        };
                    }
                    function Qt(e) {
                        return null == e ? '' : xn(e).replace(oi, le);
                    }
                    function Jt(e) {
                        return e;
                    }
                    function jt(e, t, n) {
                        var i = !0, r = t && Ce(t);
                        t && (n || r.length) || (null == n && (n = t), o = p, t = e, e = g, r = Ce(t)), n === !1 ? i = !1 : Pe(n) && 'chain' in n && (i = n.chain);
                        var o = e, s = Re(o);
                        Qe(r, function (n) {
                            var r = e[n] = t[n];
                            s && (o.prototype[n] = function () {
                                var t = this.__chain__, n = this.__wrapped__, s = [n];
                                Vn.apply(s, arguments);
                                var a = r.apply(e, s);
                                if (i || t) {
                                    if (n === a && Pe(a))
                                        return this;
                                    a = new o(a), a.__chain__ = t;
                                }
                                return a;
                            });
                        });
                    }
                    function en() {
                        return n._ = Mn, this;
                    }
                    function tn() {
                    }
                    function nn(e) {
                        return function (t) {
                            return t[e];
                        };
                    }
                    function rn(e, t, n) {
                        var i = null == e, r = null == t;
                        if (null == n && ('boolean' == typeof e && r ? (n = e, e = 1) : r || 'boolean' != typeof t || (n = t, r = !0)), i && r && (t = 1), e = +e || 0, r ? (t = e, e = 0) : t = +t || 0, n || e % 1 || t % 1) {
                            var o = Zn();
                            return Yn(e + o * (t - e + parseFloat('1e-' + ((o + '').length - 1))), t);
                        }
                        return re(e, t);
                    }
                    function on(e, t) {
                        if (e) {
                            var n = e[t];
                            return Re(n) ? e[t]() : n;
                        }
                    }
                    function sn(e, t, n) {
                        var i = g.templateSettings;
                        e = xn(e || ''), n = ai({}, n, i);
                        var r, o = ai({}, n.imports, i.imports), a = ti(o), l = Xe(o), u = 0, c = n.interpolate || R, d = '__p += \'', f = bn((n.escape || R).source + '|' + c.source + '|' + (c === T ? _ : R).source + '|' + (n.evaluate || R).source + '|$', 'g');
                        e.replace(f, function (t, n, i, o, a, l) {
                            return i || (i = o), d += e.slice(u, l).replace(A, s), n && (d += '\' +\n__e(' + n + ') +\n\''), a && (r = !0, d += '\';\n' + a + ';\n__p += \''), i && (d += '\' +\n((__t = (' + i + ')) == null ? \'\' : __t) +\n\''), u = l + t.length, t;
                        }), d += '\';\n';
                        var p = n.variable, v = p;
                        v || (p = 'obj', d = 'with (' + p + ') {\n' + d + '\n}\n'), d = (r ? d.replace(b, '') : d).replace(x, '$1').replace(E, '$1;'), d = 'function(' + p + ') {\n' + (v ? '' : p + ' || (' + p + ' = {});\n') + 'var __t, __p = \'\', __e = _.escape' + (r ? ', __j = Array.prototype.join;\n' + 'function print() { __p += __j.call(arguments, \'\') }\n' : ';\n') + d + 'return __p\n}';
                        var m = '\n/*\n//# sourceURL=' + (n.sourceURL || '/lodash/template/source[' + D++ + ']') + '\n*/';
                        try {
                            var w = mn(a, 'return ' + d + m).apply(h, l);
                        } catch (e) {
                            throw e.source = d, e;
                        }
                        return t ? w(t) : (w.source = d, w);
                    }
                    function an(e, t, n) {
                        e = (e = +e) > -1 ? e : 0;
                        var i = -1, r = gn(e);
                        for (t = Q(t, n, 1); ++i < e;)
                            r[i] = t(i);
                        return r;
                    }
                    function ln(e) {
                        return null == e ? '' : xn(e).replace(ri, fe);
                    }
                    function un(e) {
                        var t = ++v;
                        return xn(null == e ? '' : e) + t;
                    }
                    function cn(e) {
                        return e = new p(e), e.__chain__ = !0, e;
                    }
                    function dn(e, t) {
                        return t(e), e;
                    }
                    function fn() {
                        return this.__chain__ = !0, this;
                    }
                    function Sn() {
                        return xn(this.__wrapped__);
                    }
                    function hn() {
                        return this.__wrapped__;
                    }
                    n = n ? ee.defaults(Z.Object(), n, ee.pick(Z, O)) : Z;
                    var gn = n.Array, pn = n.Boolean, vn = n.Date, mn = n.Function, wn = n.Math, yn = n.Number, Cn = n.Object, bn = n.RegExp, xn = n.String, En = n.TypeError, _n = [], Fn = Cn.prototype, Mn = n._, Tn = Fn.toString, In = bn('^' + xn(Tn).replace(/[.*+?^${}()|[\]\\]/g, '\\$&').replace(/toString| for [^\]]+/g, '.*?') + '$'), Rn = wn.ceil, Pn = n.clearTimeout, An = wn.floor, On = mn.prototype.toString, Dn = ce(Dn = Cn.getPrototypeOf) && Dn, Bn = Fn.hasOwnProperty, Vn = _n.push, Kn = n.setTimeout, Nn = _n.splice, Un = _n.unshift, Ln = function () {
                            try {
                                var e = {}, t = ce(t = Cn.defineProperty) && t, n = t(e, e, e) && t;
                            } catch (e) {
                            }
                            return n;
                        }(), Hn = ce(Hn = Cn.create) && Hn, Wn = ce(Wn = gn.isArray) && Wn, qn = n.isFinite, Xn = n.isNaN, kn = ce(kn = Cn.keys) && kn, $n = wn.max, Yn = wn.min, zn = n.parseInt, Zn = wn.random, Gn = {};
                    Gn[V] = gn, Gn[K] = pn, Gn[N] = vn, Gn[U] = mn, Gn[H] = Cn, Gn[L] = yn, Gn[W] = bn, Gn[q] = xn, p.prototype = g.prototype;
                    var Qn = g.support = {};
                    Qn.funcDecomp = !ce(n.WinRTError) && P.test(f), Qn.funcNames = 'string' == typeof mn.name, g.templateSettings = {
                        escape: /<%-([\s\S]+?)%>/g,
                        evaluate: /<%([\s\S]+?)%>/g,
                        interpolate: T,
                        variable: '',
                        imports: { _: g }
                    }, Hn || (G = function () {
                        function e() {
                        }
                        return function (t) {
                            if (Pe(t)) {
                                e.prototype = t;
                                var i = new e();
                                e.prototype = null;
                            }
                            return i || n.Object();
                        };
                    }());
                    var Jn = Ln ? function (e, t) {
                            $.value = t, Ln(e, '__bindData__', $), $.value = null;
                        } : tn, jn = Wn || function (e) {
                            return e && 'object' == typeof e && 'number' == typeof e.length && Tn.call(e) == V || !1;
                        }, ei = function (e) {
                            var t, n = e, i = [];
                            if (!n)
                                return i;
                            if (!Y[typeof e])
                                return i;
                            for (t in n)
                                Bn.call(n, t) && i.push(t);
                            return i;
                        }, ti = kn ? function (e) {
                            return Pe(e) ? kn(e) : [];
                        } : ei, ni = {
                            '&': '&amp;',
                            '<': '&lt;',
                            '>': '&gt;',
                            '"': '&quot;',
                            '\'': '&#39;'
                        }, ii = xe(ni), ri = bn('(' + ti(ii).join('|') + ')', 'g'), oi = bn('[' + ti(ni).join('') + ']', 'g'), si = function (e, t, n) {
                            var i, r = e, o = r;
                            if (!r)
                                return o;
                            var s = arguments, a = 0, l = 'number' == typeof n ? 2 : s.length;
                            if (l > 3 && 'function' == typeof s[l - 2])
                                var u = Q(s[--l - 1], s[l--], 2);
                            else
                                l > 2 && 'function' == typeof s[l - 1] && (u = s[--l]);
                            for (; ++a < l;)
                                if (r = s[a], r && Y[typeof r])
                                    for (var c = -1, d = Y[typeof r] && ti(r), f = d ? d.length : 0; ++c < f;)
                                        i = d[c], o[i] = u ? u(o[i], r[i]) : r[i];
                            return o;
                        }, ai = function (e, t, n) {
                            var i, r = e, o = r;
                            if (!r)
                                return o;
                            for (var s = arguments, a = 0, l = 'number' == typeof n ? 2 : s.length; ++a < l;)
                                if (r = s[a], r && Y[typeof r])
                                    for (var u = -1, c = Y[typeof r] && ti(r), d = c ? c.length : 0; ++u < d;)
                                        i = c[u], 'undefined' == typeof o[i] && (o[i] = r[i]);
                            return o;
                        }, li = function (e, t, n) {
                            var i, r = e, o = r;
                            if (!r)
                                return o;
                            if (!Y[typeof r])
                                return o;
                            t = t && 'undefined' == typeof n ? t : Q(t, n, 3);
                            for (i in r)
                                if (t(r[i], i, e) === !1)
                                    return o;
                            return o;
                        }, ui = function (e, t, n) {
                            var i, r = e, o = r;
                            if (!r)
                                return o;
                            if (!Y[typeof r])
                                return o;
                            t = t && 'undefined' == typeof n ? t : Q(t, n, 3);
                            for (var s = -1, a = Y[typeof r] && ti(r), l = a ? a.length : 0; ++s < l;)
                                if (i = a[s], t(r[i], i, e) === !1)
                                    return o;
                            return o;
                        }, ci = Dn ? function (e) {
                            if (!e || Tn.call(e) != H)
                                return !1;
                            var t = e.valueOf, n = ce(t) && (n = Dn(t)) && Dn(n);
                            return n ? e == n || Dn(e) == n : de(e);
                        } : de, di = se(function (e, t, n) {
                            Bn.call(e, n) ? e[n]++ : e[n] = 1;
                        }), fi = se(function (e, t, n) {
                            (Bn.call(e, n) ? e[n] : e[n] = []).push(t);
                        }), Si = se(function (e, t, n) {
                            e[n] = t;
                        }), hi = et, gi = ze, pi = ce(pi = vn.now) && pi || function () {
                            return new vn().getTime();
                        }, vi = 8 == zn(C + '08') ? zn : function (e, t) {
                            return zn(Ve(e) ? e.replace(I, '') : e, t || 0);
                        };
                    return g.after = Dt, g.assign = si, g.at = ke, g.bind = Bt, g.bindAll = Vt, g.bindKey = Kt, g.chain = cn, g.compact = ft, g.compose = Nt, g.constant = Zt, g.countBy = di, g.create = pe, g.createCallback = Gt, g.curry = Ut, g.debounce = Lt, g.defaults = ai, g.defer = Ht, g.delay = Wt, g.difference = St, g.filter = ze, g.flatten = vt, g.forEach = Qe, g.forEachRight = Je, g.forIn = li, g.forInRight = we, g.forOwn = ui, g.forOwnRight = ye, g.functions = Ce, g.groupBy = fi, g.indexBy = Si, g.initial = wt, g.intersection = yt, g.invert = xe, g.invoke = je, g.keys = ti, g.map = et, g.mapValues = Ne, g.max = tt, g.memoize = qt, g.merge = Ue, g.min = nt, g.omit = Le, g.once = Xt, g.pairs = He, g.partial = kt, g.partialRight = $t, g.pick = We, g.pluck = hi, g.property = nn, g.pull = xt, g.range = Et, g.reject = ot, g.remove = _t, g.rest = Ft, g.shuffle = at, g.sortBy = ct, g.tap = dn, g.throttle = Yt, g.times = an, g.toArray = dt, g.transform = qe, g.union = Tt, g.uniq = It, g.values = Xe, g.where = gi, g.without = Rt, g.wrap = zt, g.xor = Pt, g.zip = At, g.zipObject = Ot, g.collect = et, g.drop = Ft, g.each = Qe, g.eachRight = Je, g.extend = si, g.methods = Ce, g.object = Ot, g.select = ze, g.tail = Ft, g.unique = It, g.unzip = At, jt(g), g.clone = he, g.cloneDeep = ge, g.contains = $e, g.escape = Qt, g.every = Ye, g.find = Ze, g.findIndex = ht, g.findKey = ve, g.findLast = Ge, g.findLastIndex = gt, g.findLastKey = me, g.has = be, g.identity = Jt, g.indexOf = mt, g.isArguments = Se, g.isArray = jn, g.isBoolean = Ee, g.isDate = _e, g.isElement = Fe, g.isEmpty = Me, g.isEqual = Te, g.isFinite = Ie, g.isFunction = Re, g.isNaN = Ae, g.isNull = Oe, g.isNumber = De, g.isObject = Pe, g.isPlainObject = ci, g.isRegExp = Be, g.isString = Ve, g.isUndefined = Ke, g.lastIndexOf = bt, g.mixin = jt, g.noConflict = en, g.noop = tn, g.now = pi, g.parseInt = vi, g.random = rn, g.reduce = it, g.reduceRight = rt, g.result = on, g.runInContext = f, g.size = lt, g.some = ut, g.sortedIndex = Mt, g.template = sn, g.unescape = ln, g.uniqueId = un, g.all = Ye, g.any = ut, g.detect = Ze, g.findWhere = Ze, g.foldl = it, g.foldr = rt, g.include = $e, g.inject = it, jt(function () {
                        var e = {};
                        return ui(g, function (t, n) {
                            g.prototype[n] || (e[n] = t);
                        }), e;
                    }(), !1), g.first = pt, g.last = Ct, g.sample = st, g.take = pt, g.head = pt, ui(g, function (e, t) {
                        var n = t !== 'sample';
                        g.prototype[t] || (g.prototype[t] = function (t, i) {
                            var r = this.__chain__, o = e(this.__wrapped__, t, i);
                            return r || null != t && (!i || n && 'function' == typeof t) ? new p(o, r) : o;
                        });
                    }), g.VERSION = '2.4.2', g.prototype.chain = fn, g.prototype.toString = Sn, g.prototype.value = hn, g.prototype.valueOf = hn, Qe([
                        'join',
                        'pop',
                        'shift'
                    ], function (e) {
                        var t = _n[e];
                        g.prototype[e] = function () {
                            var e = this.__chain__, n = t.apply(this.__wrapped__, arguments);
                            return e ? new p(n, e) : n;
                        };
                    }), Qe([
                        'push',
                        'reverse',
                        'sort',
                        'unshift'
                    ], function (e) {
                        var t = _n[e];
                        g.prototype[e] = function () {
                            return t.apply(this.__wrapped__, arguments), this;
                        };
                    }), Qe([
                        'concat',
                        'slice',
                        'splice'
                    ], function (e) {
                        var t = _n[e];
                        g.prototype[e] = function () {
                            return new p(t.apply(this.__wrapped__, arguments), this.__chain__);
                        };
                    }), g;
                }
                var h, g = [], p = [], v = 0, m = +new Date() + '', w = 75, y = 40, C = ' \t\x0B\f\xA0\uFEFF' + '\n\r\u2028\u2029' + '\u1680\u180E\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200A\u202F\u205F\u3000', b = /\b__p \+= '';/g, x = /\b(__p \+=) '' \+/g, E = /(__e\(.*?\)|\b__t\)) \+\n'';/g, _ = /\$\{([^\\}]*(?:\\.[^\\}]*)*)\}/g, F = /\w*$/, M = /^\s*function[ \n\r\t]+\w/, T = /<%=([\s\S]+?)%>/g, I = RegExp('^[' + C + ']*0+(?=.$)'), R = /($^)/, P = /\bthis\b/, A = /['\n\r\t\u2028\u2029\\]/g, O = [
                        'Array',
                        'Boolean',
                        'Date',
                        'Function',
                        'Math',
                        'Number',
                        'Object',
                        'RegExp',
                        'String',
                        '_',
                        'attachEvent',
                        'clearTimeout',
                        'isFinite',
                        'isNaN',
                        'parseInt',
                        'setTimeout'
                    ], D = 0, B = '[object Arguments]', V = '[object Array]', K = '[object Boolean]', N = '[object Date]', U = '[object Function]', L = '[object Number]', H = '[object Object]', W = '[object RegExp]', q = '[object String]', X = {};
                X[U] = !1, X[B] = X[V] = X[K] = X[N] = X[L] = X[H] = X[W] = X[q] = !0;
                var k = {
                        leading: !1,
                        maxWait: 0,
                        trailing: !1
                    }, $ = {
                        configurable: !1,
                        enumerable: !1,
                        value: null,
                        writable: !1
                    }, Y = {
                        boolean: !1,
                        function: !0,
                        object: !0,
                        number: !1,
                        string: !1,
                        undefined: !1
                    }, z = {
                        '\\': '\\',
                        '\'': '\'',
                        '\n': 'n',
                        '\r': 'r',
                        '\t': 't',
                        '\u2028': 'u2028',
                        '\u2029': 'u2029'
                    }, Z = Y[typeof window] && window || this, G = Y[typeof exports] && exports && !exports.nodeType && exports, Q = Y[typeof module] && module && !module.nodeType && module, J = Q && Q.exports === G && G, j = Y[typeof global] && global;
                !j || j.global !== j && j.window !== j || (Z = j);
                var ee = f();
                'function' == typeof CKFinder.define && 'object' == typeof CKFinder.define.amd && CKFinder.define.amd ? (Z._ = ee, CKFinder.define('underscore', [], function () {
                    return ee;
                })) : G && Q ? J ? (Q.exports = ee)._ = ee : G._ = ee : Z._ = ee;
            }.call(this), function () {
                function e(t, n, i) {
                    return ('string' == typeof n ? n : n.toString()).replace(t.define || s, function (e, n, r, o) {
                        return 0 === n.indexOf('def.') && (n = n.substring(4)), n in i || (':' === r ? (t.defineParams && o.replace(t.defineParams, function (e, t, r) {
                            i[n] = {
                                arg: t,
                                text: r
                            };
                        }), n in i || (i[n] = o)) : new Function('def', 'def[\'' + n + '\']=' + o)(i)), '';
                    }).replace(t.use || s, function (n, r) {
                        t.useParams && (r = r.replace(t.useParams, function (e, t, n, r) {
                            if (i[n] && i[n].arg && r)
                                return e = (n + ':' + r).replace(/'|\\/g, '_'), i.__exp = i.__exp || {}, i.__exp[e] = i[n].text.replace(new RegExp('(^|[^\\w$])' + i[n].arg + '([^\\w$])', 'g'), '$1' + r + '$2'), t + 'def.__exp[\'' + e + '\']';
                        }));
                        var o = new Function('def', 'return ' + r)(i);
                        return o ? e(t, o, i) : o;
                    });
                }
                function t(e) {
                    return e.replace(/\\('|\\)/g, '$1').replace(/[\r\t\n]/g, ' ');
                }
                var n, i = {
                        version: '1.0.3',
                        templateSettings: {
                            evaluate: /\{\{([\s\S]+?(\}?)+)\}\}/g,
                            interpolate: /\{\{=([\s\S]+?)\}\}/g,
                            encode: /\{\{!([\s\S]+?)\}\}/g,
                            use: /\{\{#([\s\S]+?)\}\}/g,
                            useParams: /(^|[^\w$])def(?:\.|\[[\'\"])([\w$\.]+)(?:[\'\"]\])?\s*\:\s*([\w$\.]+|\"[^\"]+\"|\'[^\']+\'|\{[^\}]+\})/g,
                            define: /\{\{##\s*([\w\.$]+)\s*(\:|=)([\s\S]+?)#\}\}/g,
                            defineParams: /^\s*([\w$]+):([\s\S]+)/,
                            conditional: /\{\{\?(\?)?\s*([\s\S]*?)\s*\}\}/g,
                            iterate: /\{\{~\s*(?:\}\}|([\s\S]+?)\s*\:\s*([\w$]+)\s*(?:\:\s*([\w$]+))?\s*\}\})/g,
                            varname: 'it',
                            strip: !0,
                            append: !0,
                            selfcontained: !1,
                            doNotSkipEncoded: !1
                        },
                        template: void 0,
                        compile: void 0
                    };
                i.encodeHTMLSource = function (e) {
                    var t = {
                            '&': '&#38;',
                            '<': '&#60;',
                            '>': '&#62;',
                            '"': '&#34;',
                            '\'': '&#39;',
                            '/': '&#47;'
                        }, n = e ? /[&<>"'\/]/g : /&(?!#?\w+;)|<|>|"|'|\//g;
                    return function (e) {
                        return e ? e.toString().replace(n, function (e) {
                            return t[e] || e;
                        }) : '';
                    };
                }, n = function () {
                    return this || (0, eval)('this');
                }(), 'undefined' != typeof module && module.exports ? module.exports = i : 'function' == typeof CKFinder.define && CKFinder.define.amd ? CKFinder.define('doT', [], function () {
                    return i;
                }) : n.doT = i;
                var r = {
                        start: '\'+(',
                        end: ')+\'',
                        startencode: '\'+encodeHTML('
                    }, o = {
                        start: '\';out+=(',
                        end: ');out+=\'',
                        startencode: '\';out+=encodeHTML('
                    }, s = /$^/;
                i.template = function (a, l, u) {
                    l = l || i.templateSettings;
                    var c, d, f = l.append ? r : o, h = 0;
                    a = l.use || l.define ? e(l, a, u || {}) : a, a = ('var out=\'' + (l.strip ? a.replace(/(^|\r|\n)\t* +| +\t*(\r|\n|$)/g, ' ').replace(/\r|\n|\t|\/\*[\s\S]*?\*\//g, '') : a).replace(/'|\\/g, '\\$&').replace(l.interpolate || s, function (e, n) {
                        return f.start + t(n) + f.end;
                    }).replace(l.encode || s, function (e, n) {
                        return c = !0, f.startencode + t(n) + f.end;
                    }).replace(l.conditional || s, function (e, n, i) {
                        return n ? i ? '\';}else if(' + t(i) + '){out+=\'' : '\';}else{out+=\'' : i ? '\';if(' + t(i) + '){out+=\'' : '\';}out+=\'';
                    }).replace(l.iterate || s, function (e, n, i, r) {
                        return n ? (h += 1, d = r || 'i' + h, n = t(n), '\';var arr' + h + '=' + n + ';if(arr' + h + '){var ' + i + ',' + d + '=-1,l' + h + '=arr' + h + '.length-1;while(' + d + '<l' + h + '){' + i + '=arr' + h + '[' + d + '+=1];out+=\'') : '\';} } out+=\'';
                    }).replace(l.evaluate || s, function (e, n) {
                        return '\';' + t(n) + 'out+=\'';
                    }) + '\';return out;').replace(/\n/g, '\\n').replace(/\t/g, '\\t').replace(/\r/g, '\\r').replace(/(\s|;|\}|^|\{)out\+='';/g, '$1').replace(/\+''/g, ''), c && (l.selfcontained || !n || n._encodeHTML || (n._encodeHTML = i.encodeHTMLSource(l.doNotSkipEncoded)), a = 'var encodeHTML = typeof _encodeHTML !== \'undefined\' ? _encodeHTML : (' + i.encodeHTMLSource.toString() + '(' + (l.doNotSkipEncoded || '') + '));' + a);
                    try {
                        return new Function(l.varname, a);
                    } catch (e) {
                        throw 'undefined' != typeof console && console.log('Could not create a template function: ' + a), e;
                    }
                }, i.compile = function (e, t) {
                    return i.template(e, null, t);
                };
            }(), function (e, t) {
                if ('function' == typeof CKFinder.define && CKFinder.define.amd)
                    CKFinder.define('backbone', [
                        'underscore',
                        'jquery',
                        'exports'
                    ], function (n, i, r) {
                        e.Backbone = t(e, r, n, i);
                    });
                else if ('undefined' != typeof exports) {
                    var n = require('underscore');
                    t(e, exports, n);
                } else
                    e.Backbone = t(e, {}, e._, e.jQuery || e.Zepto || e.ender || e.$);
            }(this, function (e, t, n, i) {
                var r = e.Backbone, o = [], s = (o.push, o.slice);
                o.splice;
                t.VERSION = '1.1.2', t.$ = i, t.noConflict = function () {
                    return e.Backbone = r, this;
                }, t.emulateHTTP = !1, t.emulateJSON = !1;
                var a = t.Events = {
                        on: function (e, t, n) {
                            if (!u(this, 'on', e, [
                                    t,
                                    n
                                ]) || !t)
                                return this;
                            this._events || (this._events = {});
                            var i = this._events[e] || (this._events[e] = []);
                            return i.push({
                                callback: t,
                                context: n,
                                ctx: n || this
                            }), this;
                        },
                        once: function (e, t, i) {
                            if (!u(this, 'once', e, [
                                    t,
                                    i
                                ]) || !t)
                                return this;
                            var r = this, o = n.once(function () {
                                    r.off(e, o), t.apply(this, arguments);
                                });
                            return o._callback = t, this.on(e, o, i);
                        },
                        off: function (e, t, i) {
                            var r, o, s, a, l, c, d, f;
                            if (!this._events || !u(this, 'off', e, [
                                    t,
                                    i
                                ]))
                                return this;
                            if (!e && !t && !i)
                                return this._events = void 0, this;
                            for (a = e ? [e] : n.keys(this._events), l = 0, c = a.length; l < c; l++)
                                if (e = a[l], s = this._events[e]) {
                                    if (this._events[e] = r = [], t || i)
                                        for (d = 0, f = s.length; d < f; d++)
                                            o = s[d], (t && t !== o.callback && t !== o.callback._callback || i && i !== o.context) && r.push(o);
                                    r.length || delete this._events[e];
                                }
                            return this;
                        },
                        trigger: function (e) {
                            if (!this._events)
                                return this;
                            var t = s.call(arguments, 1);
                            if (!u(this, 'trigger', e, t))
                                return this;
                            var n = this._events[e], i = this._events.all;
                            return n && c(n, t), i && c(i, arguments), this;
                        },
                        stopListening: function (e, t, i) {
                            var r = this._listeningTo;
                            if (!r)
                                return this;
                            var o = !t && !i;
                            i || 'object' != typeof t || (i = this), e && ((r = {})[e._listenId] = e);
                            for (var s in r)
                                e = r[s], e.off(t, i, this), (o || n.isEmpty(e._events)) && delete this._listeningTo[s];
                            return this;
                        }
                    }, l = /\s+/, u = function (e, t, n, i) {
                        if (!n)
                            return !0;
                        if ('object' == typeof n) {
                            for (var r in n)
                                e[t].apply(e, [
                                    r,
                                    n[r]
                                ].concat(i));
                            return !1;
                        }
                        if (l.test(n)) {
                            for (var o = n.split(l), s = 0, a = o.length; s < a; s++)
                                e[t].apply(e, [o[s]].concat(i));
                            return !1;
                        }
                        return !0;
                    }, c = function (e, t) {
                        var n, i = -1, r = e.length, o = t[0], s = t[1], a = t[2];
                        switch (t.length) {
                        case 0:
                            for (; ++i < r;)
                                (n = e[i]).callback.call(n.ctx);
                            return;
                        case 1:
                            for (; ++i < r;)
                                (n = e[i]).callback.call(n.ctx, o);
                            return;
                        case 2:
                            for (; ++i < r;)
                                (n = e[i]).callback.call(n.ctx, o, s);
                            return;
                        case 3:
                            for (; ++i < r;)
                                (n = e[i]).callback.call(n.ctx, o, s, a);
                            return;
                        default:
                            for (; ++i < r;)
                                (n = e[i]).callback.apply(n.ctx, t);
                            return;
                        }
                    }, d = {
                        listenTo: 'on',
                        listenToOnce: 'once'
                    };
                n.each(d, function (e, t) {
                    a[t] = function (t, i, r) {
                        var o = this._listeningTo || (this._listeningTo = {}), s = t._listenId || (t._listenId = n.uniqueId('l'));
                        return o[s] = t, r || 'object' != typeof i || (r = this), t[e](i, r, this), this;
                    };
                }), a.bind = a.on, a.unbind = a.off, n.extend(t, a);
                var f = t.Model = function (e, t) {
                    var i = e || {};
                    t || (t = {}), this.cid = n.uniqueId('c'), this.attributes = {}, t.collection && (this.collection = t.collection), t.parse && (i = this.parse(i, t) || {}), i = n.defaults({}, i, n.result(this, 'defaults')), this.set(i, t), this.changed = {}, this.initialize.apply(this, arguments);
                };
                n.extend(f.prototype, a, {
                    changed: null,
                    validationError: null,
                    idAttribute: 'id',
                    initialize: function () {
                    },
                    toJSON: function (e) {
                        return n.clone(this.attributes);
                    },
                    sync: function () {
                        return t.sync.apply(this, arguments);
                    },
                    get: function (e) {
                        return this.attributes[e];
                    },
                    escape: function (e) {
                        return n.escape(this.get(e));
                    },
                    has: function (e) {
                        return null != this.get(e);
                    },
                    set: function (e, t, i) {
                        var r, o, s, a, l, u, c, d;
                        if (null == e)
                            return this;
                        if ('object' == typeof e ? (o = e, i = t) : (o = {})[e] = t, i || (i = {}), !this._validate(o, i))
                            return !1;
                        s = i.unset, l = i.silent, a = [], u = this._changing, this._changing = !0, u || (this._previousAttributes = n.clone(this.attributes), this.changed = {}), d = this.attributes, c = this._previousAttributes, this.idAttribute in o && (this.id = o[this.idAttribute]);
                        for (r in o)
                            t = o[r], n.isEqual(d[r], t) || a.push(r), n.isEqual(c[r], t) ? delete this.changed[r] : this.changed[r] = t, s ? delete d[r] : d[r] = t;
                        if (!l) {
                            a.length && (this._pending = i);
                            for (var f = 0, h = a.length; f < h; f++)
                                this.trigger('change:' + a[f], this, d[a[f]], i);
                        }
                        if (u)
                            return this;
                        if (!l)
                            for (; this._pending;)
                                i = this._pending, this._pending = !1, this.trigger('change', this, i);
                        return this._pending = !1, this._changing = !1, this;
                    },
                    unset: function (e, t) {
                        return this.set(e, void 0, n.extend({}, t, { unset: !0 }));
                    },
                    clear: function (e) {
                        var t = {};
                        for (var i in this.attributes)
                            t[i] = void 0;
                        return this.set(t, n.extend({}, e, { unset: !0 }));
                    },
                    hasChanged: function (e) {
                        return null == e ? !n.isEmpty(this.changed) : n.has(this.changed, e);
                    },
                    changedAttributes: function (e) {
                        if (!e)
                            return !!this.hasChanged() && n.clone(this.changed);
                        var t, i = !1, r = this._changing ? this._previousAttributes : this.attributes;
                        for (var o in e)
                            n.isEqual(r[o], t = e[o]) || ((i || (i = {}))[o] = t);
                        return i;
                    },
                    previous: function (e) {
                        return null != e && this._previousAttributes ? this._previousAttributes[e] : null;
                    },
                    previousAttributes: function () {
                        return n.clone(this._previousAttributes);
                    },
                    fetch: function (e) {
                        e = e ? n.clone(e) : {}, void 0 === e.parse && (e.parse = !0);
                        var t = this, i = e.success;
                        return e.success = function (n) {
                            return !!t.set(t.parse(n, e), e) && (i && i(t, n, e), void t.trigger('sync', t, n, e));
                        }, N(this, e), this.sync('read', this, e);
                    },
                    save: function (e, t, i) {
                        var r, o, s, a = this.attributes;
                        if (null == e || 'object' == typeof e ? (r = e, i = t) : (r = {})[e] = t, i = n.extend({ validate: !0 }, i), r && !i.wait) {
                            if (!this.set(r, i))
                                return !1;
                        } else if (!this._validate(r, i))
                            return !1;
                        r && i.wait && (this.attributes = n.extend({}, a, r)), void 0 === i.parse && (i.parse = !0);
                        var l = this, u = i.success;
                        return i.success = function (e) {
                            l.attributes = a;
                            var t = l.parse(e, i);
                            return i.wait && (t = n.extend(r || {}, t)), !(n.isObject(t) && !l.set(t, i)) && (u && u(l, e, i), void l.trigger('sync', l, e, i));
                        }, N(this, i), o = this.isNew() ? 'create' : i.patch ? 'patch' : 'update', o === 'patch' && (i.attrs = r), s = this.sync(o, this, i), r && i.wait && (this.attributes = a), s;
                    },
                    destroy: function (e) {
                        e = e ? n.clone(e) : {};
                        var t = this, i = e.success, r = function () {
                                t.trigger('destroy', t, t.collection, e);
                            };
                        if (e.success = function (n) {
                                (e.wait || t.isNew()) && r(), i && i(t, n, e), t.isNew() || t.trigger('sync', t, n, e);
                            }, this.isNew())
                            return e.success(), !1;
                        N(this, e);
                        var o = this.sync('delete', this, e);
                        return e.wait || r(), o;
                    },
                    url: function () {
                        var e = n.result(this, 'urlRoot') || n.result(this.collection, 'url') || K();
                        return this.isNew() ? e : e.replace(/([^\/])$/, '$1/') + encodeURIComponent(this.id);
                    },
                    parse: function (e, t) {
                        return e;
                    },
                    clone: function () {
                        return new this.constructor(this.attributes);
                    },
                    isNew: function () {
                        return !this.has(this.idAttribute);
                    },
                    isValid: function (e) {
                        return this._validate({}, n.extend(e || {}, { validate: !0 }));
                    },
                    _validate: function (e, t) {
                        if (!t.validate || !this.validate)
                            return !0;
                        e = n.extend({}, this.attributes, e);
                        var i = this.validationError = this.validate(e, t) || null;
                        return !i || (this.trigger('invalid', this, i, n.extend(t, { validationError: i })), !1);
                    }
                });
                var h = [
                    'keys',
                    'values',
                    'pairs',
                    'invert',
                    'pick',
                    'omit'
                ];
                n.each(h, function (e) {
                    f.prototype[e] = function () {
                        var t = s.call(arguments);
                        return t.unshift(this.attributes), n[e].apply(n, t);
                    };
                });
                var g = t.Collection = function (e, t) {
                        t || (t = {}), t.model && (this.model = t.model), void 0 !== t.comparator && (this.comparator = t.comparator), this._reset(), this.initialize.apply(this, arguments), e && this.reset(e, n.extend({ silent: !0 }, t));
                    }, p = {
                        add: !0,
                        remove: !0,
                        merge: !0
                    }, v = {
                        add: !0,
                        remove: !1
                    };
                n.extend(g.prototype, a, {
                    model: f,
                    initialize: function () {
                    },
                    toJSON: function (e) {
                        return this.map(function (t) {
                            return t.toJSON(e);
                        });
                    },
                    sync: function () {
                        return t.sync.apply(this, arguments);
                    },
                    add: function (e, t) {
                        return this.set(e, n.extend({ merge: !1 }, t, v));
                    },
                    remove: function (e, t) {
                        var i = !n.isArray(e);
                        e = i ? [e] : n.clone(e), t || (t = {});
                        var r, o, s, a;
                        for (r = 0, o = e.length; r < o; r++)
                            a = e[r] = this.get(e[r]), a && (delete this._byId[a.id], delete this._byId[a.cid], s = this.indexOf(a), this.models.splice(s, 1), this.length--, t.silent || (t.index = s, a.trigger('remove', a, this, t)), this._removeReference(a, t));
                        return i ? e[0] : e;
                    },
                    set: function (e, t) {
                        t = n.defaults({}, t, p), t.parse && (e = this.parse(e, t));
                        var i = !n.isArray(e);
                        e = i ? e ? [e] : [] : n.clone(e);
                        var r, o, s, a, l, u, c, d = t.at, h = this.model, g = this.comparator && null == d && t.sort !== !1, v = n.isString(this.comparator) ? this.comparator : null, m = [], w = [], y = {}, C = t.add, b = t.merge, x = t.remove, E = !(g || !C || !x) && [];
                        for (r = 0, o = e.length; r < o; r++) {
                            if (l = e[r] || {}, s = l instanceof f ? a = l : l[h.prototype.idAttribute || 'id'], u = this.get(s))
                                x && (y[u.cid] = !0), b && (l = l === a ? a.attributes : l, t.parse && (l = u.parse(l, t)), u.set(l, t), g && !c && u.hasChanged(v) && (c = !0)), e[r] = u;
                            else if (C) {
                                if (a = e[r] = this._prepareModel(l, t), !a)
                                    continue;
                                m.push(a), this._addReference(a, t);
                            }
                            a = u || a, !E || !a.isNew() && y[a.id] || E.push(a), y[a.id] = !0;
                        }
                        if (x) {
                            for (r = 0, o = this.length; r < o; ++r)
                                y[(a = this.models[r]).cid] || w.push(a);
                            w.length && this.remove(w, t);
                        }
                        if (m.length || E && E.length)
                            if (g && (c = !0), this.length += m.length, null != d)
                                for (r = 0, o = m.length; r < o; r++)
                                    this.models.splice(d + r, 0, m[r]);
                            else {
                                E && (this.models.length = 0);
                                var _ = E || m;
                                for (r = 0, o = _.length; r < o; r++)
                                    this.models.push(_[r]);
                            }
                        if (c && this.sort({ silent: !0 }), !t.silent) {
                            for (r = 0, o = m.length; r < o; r++)
                                (a = m[r]).trigger('add', a, this, t);
                            (c || E && E.length) && this.trigger('sort', this, t);
                        }
                        return i ? e[0] : e;
                    },
                    reset: function (e, t) {
                        t || (t = {});
                        for (var i = 0, r = this.models.length; i < r; i++)
                            this._removeReference(this.models[i], t);
                        return t.previousModels = this.models, this._reset(), e = this.add(e, n.extend({ silent: !0 }, t)), t.silent || this.trigger('reset', this, t), e;
                    },
                    push: function (e, t) {
                        return this.add(e, n.extend({ at: this.length }, t));
                    },
                    pop: function (e) {
                        var t = this.at(this.length - 1);
                        return this.remove(t, e), t;
                    },
                    unshift: function (e, t) {
                        return this.add(e, n.extend({ at: 0 }, t));
                    },
                    shift: function (e) {
                        var t = this.at(0);
                        return this.remove(t, e), t;
                    },
                    slice: function () {
                        return s.apply(this.models, arguments);
                    },
                    get: function (e) {
                        if (null != e)
                            return this._byId[e] || this._byId[e.id] || this._byId[e.cid];
                    },
                    at: function (e) {
                        return this.models[e];
                    },
                    where: function (e, t) {
                        return n.isEmpty(e) ? t ? void 0 : [] : this[t ? 'find' : 'filter'](function (t) {
                            for (var n in e)
                                if (e[n] !== t.get(n))
                                    return !1;
                            return !0;
                        });
                    },
                    findWhere: function (e) {
                        return this.where(e, !0);
                    },
                    sort: function (e) {
                        if (!this.comparator)
                            throw new Error('Cannot sort a set without a comparator');
                        return e || (e = {}), n.isString(this.comparator) || 1 === this.comparator.length ? this.models = this.sortBy(this.comparator, this) : this.models.sort(n.bind(this.comparator, this)), e.silent || this.trigger('sort', this, e), this;
                    },
                    pluck: function (e) {
                        return n.invoke(this.models, 'get', e);
                    },
                    fetch: function (e) {
                        e = e ? n.clone(e) : {}, void 0 === e.parse && (e.parse = !0);
                        var t = e.success, i = this;
                        return e.success = function (n) {
                            var r = e.reset ? 'reset' : 'set';
                            i[r](n, e), t && t(i, n, e), i.trigger('sync', i, n, e);
                        }, N(this, e), this.sync('read', this, e);
                    },
                    create: function (e, t) {
                        if (t = t ? n.clone(t) : {}, !(e = this._prepareModel(e, t)))
                            return !1;
                        t.wait || this.add(e, t);
                        var i = this, r = t.success;
                        return t.success = function (e, n) {
                            t.wait && i.add(e, t), r && r(e, n, t);
                        }, e.save(null, t), e;
                    },
                    parse: function (e, t) {
                        return e;
                    },
                    clone: function () {
                        return new this.constructor(this.models);
                    },
                    _reset: function () {
                        this.length = 0, this.models = [], this._byId = {};
                    },
                    _prepareModel: function (e, t) {
                        if (e instanceof f)
                            return e;
                        t = t ? n.clone(t) : {}, t.collection = this;
                        var i = new this.model(e, t);
                        return i.validationError ? (this.trigger('invalid', this, i.validationError, t), !1) : i;
                    },
                    _addReference: function (e, t) {
                        this._byId[e.cid] = e, null != e.id && (this._byId[e.id] = e), e.collection || (e.collection = this), e.on('all', this._onModelEvent, this);
                    },
                    _removeReference: function (e, t) {
                        this === e.collection && delete e.collection, e.off('all', this._onModelEvent, this);
                    },
                    _onModelEvent: function (e, t, n, i) {
                        (e !== 'add' && e !== 'remove' || n === this) && (e === 'destroy' && this.remove(t, i), t && e === 'change:' + t.idAttribute && (delete this._byId[t.previous(t.idAttribute)], null != t.id && (this._byId[t.id] = t)), this.trigger.apply(this, arguments));
                    }
                });
                var m = [
                    'forEach',
                    'each',
                    'map',
                    'collect',
                    'reduce',
                    'foldl',
                    'inject',
                    'reduceRight',
                    'foldr',
                    'find',
                    'detect',
                    'filter',
                    'select',
                    'reject',
                    'every',
                    'all',
                    'some',
                    'any',
                    'include',
                    'contains',
                    'invoke',
                    'max',
                    'min',
                    'toArray',
                    'size',
                    'first',
                    'head',
                    'take',
                    'initial',
                    'rest',
                    'tail',
                    'drop',
                    'last',
                    'without',
                    'difference',
                    'indexOf',
                    'shuffle',
                    'lastIndexOf',
                    'isEmpty',
                    'chain',
                    'sample'
                ];
                n.each(m, function (e) {
                    g.prototype[e] = function () {
                        var t = s.call(arguments);
                        return t.unshift(this.models), n[e].apply(n, t);
                    };
                });
                var w = [
                    'groupBy',
                    'countBy',
                    'sortBy',
                    'indexBy'
                ];
                n.each(w, function (e) {
                    g.prototype[e] = function (t, i) {
                        var r = n.isFunction(t) ? t : function (e) {
                            return e.get(t);
                        };
                        return n[e](this.models, r, i);
                    };
                });
                var y = t.View = function (e) {
                        this.cid = n.uniqueId('view'), e || (e = {}), n.extend(this, n.pick(e, b)), this._ensureElement(), this.initialize.apply(this, arguments), this.delegateEvents();
                    }, C = /^(\S+)\s*(.*)$/, b = [
                        'model',
                        'collection',
                        'el',
                        'id',
                        'attributes',
                        'className',
                        'tagName',
                        'events'
                    ];
                n.extend(y.prototype, a, {
                    tagName: 'div',
                    $: function (e) {
                        return this.$el.find(e);
                    },
                    initialize: function () {
                    },
                    render: function () {
                        return this;
                    },
                    remove: function () {
                        return this.$el.remove(), this.stopListening(), this;
                    },
                    setElement: function (e, n) {
                        return this.$el && this.undelegateEvents(), this.$el = e instanceof t.$ ? e : t.$(e), this.el = this.$el[0], n !== !1 && this.delegateEvents(), this;
                    },
                    delegateEvents: function (e) {
                        if (!e && !(e = n.result(this, 'events')))
                            return this;
                        this.undelegateEvents();
                        for (var t in e) {
                            var i = e[t];
                            if (n.isFunction(i) || (i = this[e[t]]), i) {
                                var r = t.match(C), o = r[1], s = r[2];
                                i = n.bind(i, this), o += '.delegateEvents' + this.cid, '' === s ? this.$el.on(o, i) : this.$el.on(o, s, i);
                            }
                        }
                        return this;
                    },
                    undelegateEvents: function () {
                        return this.$el.off('.delegateEvents' + this.cid), this;
                    },
                    _ensureElement: function () {
                        if (this.el)
                            this.setElement(n.result(this, 'el'), !1);
                        else {
                            var e = n.extend({}, n.result(this, 'attributes'));
                            this.id && (e.id = n.result(this, 'id')), this.className && (e['class'] = n.result(this, 'className'));
                            var i = t.$('<' + n.result(this, 'tagName') + '>').attr(e);
                            this.setElement(i, !1);
                        }
                    }
                }), t.sync = function (e, i, r) {
                    var o = E[e];
                    n.defaults(r || (r = {}), {
                        emulateHTTP: t.emulateHTTP,
                        emulateJSON: t.emulateJSON
                    });
                    var s = {
                        type: o,
                        dataType: 'json'
                    };
                    if (r.url || (s.url = n.result(i, 'url') || K()), null != r.data || !i || e !== 'create' && e !== 'update' && e !== 'patch' || (s.contentType = 'application/json', s.data = JSON.stringify(r.attrs || i.toJSON(r))), r.emulateJSON && (s.contentType = 'application/x-www-form-urlencoded', s.data = s.data ? { model: s.data } : {}), r.emulateHTTP && (o === 'PUT' || o === 'DELETE' || o === 'PATCH')) {
                        s.type = 'POST', r.emulateJSON && (s.data._method = o);
                        var a = r.beforeSend;
                        r.beforeSend = function (e) {
                            if (e.setRequestHeader('X-HTTP-Method-Override', o), a)
                                return a.apply(this, arguments);
                        };
                    }
                    s.type === 'GET' || r.emulateJSON || (s.processData = !1), s.type === 'PATCH' && x && (s.xhr = function () {
                        return new ActiveXObject('Microsoft.XMLHTTP');
                    });
                    var l = r.xhr = t.ajax(n.extend(s, r));
                    return i.trigger('request', i, l, r), l;
                };
                var x = !('undefined' == typeof window || !window.ActiveXObject || window.XMLHttpRequest && new XMLHttpRequest().dispatchEvent), E = {
                        create: 'POST',
                        update: 'PUT',
                        patch: 'PATCH',
                        delete: 'DELETE',
                        read: 'GET'
                    };
                t.ajax = function () {
                    return t.$.ajax.apply(t.$, arguments);
                };
                var _ = t.Router = function (e) {
                        e || (e = {}), e.routes && (this.routes = e.routes), this._bindRoutes(), this.initialize.apply(this, arguments);
                    }, F = /\((.*?)\)/g, M = /(\(\?)?:\w+/g, T = /\*\w+/g, I = /[\-{}\[\]+?.,\\\^$|#\s]/g;
                n.extend(_.prototype, a, {
                    initialize: function () {
                    },
                    route: function (e, i, r) {
                        n.isRegExp(e) || (e = this._routeToRegExp(e)), n.isFunction(i) && (r = i, i = ''), r || (r = this[i]);
                        var o = this;
                        return t.history.route(e, function (n) {
                            var s = o._extractParameters(e, n);
                            o.execute(r, s), o.trigger.apply(o, ['route:' + i].concat(s)), o.trigger('route', i, s), t.history.trigger('route', o, i, s);
                        }), this;
                    },
                    execute: function (e, t) {
                        e && e.apply(this, t);
                    },
                    navigate: function (e, n) {
                        return t.history.navigate(e, n), this;
                    },
                    _bindRoutes: function () {
                        if (this.routes) {
                            this.routes = n.result(this, 'routes');
                            for (var e, t = n.keys(this.routes); null != (e = t.pop());)
                                this.route(e, this.routes[e]);
                        }
                    },
                    _routeToRegExp: function (e) {
                        return e = e.replace(I, '\\$&').replace(F, '(?:$1)?').replace(M, function (e, t) {
                            return t ? e : '([^/?]+)';
                        }).replace(T, '([^?]*?)'), new RegExp('^' + e + '(?:\\?([\\s\\S]*))?$');
                    },
                    _extractParameters: function (e, t) {
                        var i = e.exec(t).slice(1);
                        return n.map(i, function (e, t) {
                            return t === i.length - 1 ? e || null : e ? decodeURIComponent(e) : null;
                        });
                    }
                });
                var R = t.History = function () {
                        this.handlers = [], n.bindAll(this, 'checkUrl'), 'undefined' != typeof window && (this.location = window.location, this.history = window.history);
                    }, P = /^[#\/]|\s+$/g, A = /^\/+|\/+$/g, O = /msie [\w.]+/, D = /\/$/, B = /#.*$/;
                R.started = !1, n.extend(R.prototype, a, {
                    interval: 50,
                    atRoot: function () {
                        return this.location.pathname.replace(/[^\/]$/, '$&/') === this.root;
                    },
                    getHash: function (e) {
                        var t = (e || this).location.href.match(/#(.*)$/);
                        return t ? t[1] : '';
                    },
                    getFragment: function (e, t) {
                        if (null == e)
                            if (this._hasPushState || !this._wantsHashChange || t) {
                                e = decodeURI(this.location.pathname + this.location.search);
                                var n = this.root.replace(D, '');
                                e.indexOf(n) || (e = e.slice(n.length));
                            } else
                                e = this.getHash();
                        return e.replace(P, '');
                    },
                    start: function (e) {
                        if (R.started)
                            throw new Error('Backbone.history has already been started');
                        R.started = !0, this.options = n.extend({ root: '/' }, this.options, e), this.root = this.options.root, this._wantsHashChange = this.options.hashChange !== !1, this._wantsPushState = !!this.options.pushState, this._hasPushState = !!(this.options.pushState && this.history && this.history.pushState);
                        var i = this.getFragment(), r = document.documentMode, o = O.exec(navigator.userAgent.toLowerCase()) && (!r || r <= 7);
                        if (this.root = ('/' + this.root + '/').replace(A, '/'), o && this._wantsHashChange) {
                            var s = t.$('<iframe src="javascript:0" tabindex="-1">');
                            this.iframe = s.hide().appendTo('body')[0].contentWindow, this.navigate(i);
                        }
                        this._hasPushState ? t.$(window).on('popstate', this.checkUrl) : this._wantsHashChange && 'onhashchange' in window && !o ? t.$(window).on('hashchange', this.checkUrl) : this._wantsHashChange && (this._checkUrlInterval = setInterval(this.checkUrl, this.interval)), this.fragment = i;
                        var a = this.location;
                        if (this._wantsHashChange && this._wantsPushState) {
                            if (!this._hasPushState && !this.atRoot())
                                return this.fragment = this.getFragment(null, !0), this.location.replace(this.root + '#' + this.fragment), !0;
                            this._hasPushState && this.atRoot() && a.hash && (this.fragment = this.getHash().replace(P, ''), this.history.replaceState({}, document.title, this.root + this.fragment));
                        }
                        if (!this.options.silent)
                            return this.loadUrl();
                    },
                    stop: function () {
                        t.$(window).off('popstate', this.checkUrl).off('hashchange', this.checkUrl), this._checkUrlInterval && clearInterval(this._checkUrlInterval), R.started = !1;
                    },
                    route: function (e, t) {
                        this.handlers.unshift({
                            route: e,
                            callback: t
                        });
                    },
                    checkUrl: function (e) {
                        var t = this.getFragment();
                        return t === this.fragment && this.iframe && (t = this.getFragment(this.getHash(this.iframe))), t !== this.fragment && (this.iframe && this.navigate(t), void this.loadUrl());
                    },
                    loadUrl: function (e) {
                        return e = this.fragment = this.getFragment(e), n.any(this.handlers, function (t) {
                            if (t.route.test(e))
                                return t.callback(e), !0;
                        });
                    },
                    navigate: function (e, t) {
                        if (!R.started)
                            return !1;
                        t && t !== !0 || (t = { trigger: !!t });
                        var n = this.root + (e = this.getFragment(e || ''));
                        if (e = e.replace(B, ''), this.fragment !== e) {
                            if (this.fragment = e, '' === e && '/' !== n && (n = n.slice(0, -1)), this._hasPushState)
                                this.history[t.replace ? 'replaceState' : 'pushState']({}, document.title, n);
                            else {
                                if (!this._wantsHashChange)
                                    return this.location.assign(n);
                                this._updateHash(this.location, e, t.replace), this.iframe && e !== this.getFragment(this.getHash(this.iframe)) && (t.replace || this.iframe.document.open().close(), this._updateHash(this.iframe.location, e, t.replace));
                            }
                            return t.trigger ? this.loadUrl(e) : void 0;
                        }
                    },
                    _updateHash: function (e, t, n) {
                        if (n) {
                            var i = e.href.replace(/(javascript:|#).*$/, '');
                            e.replace(i + '#' + t);
                        } else
                            e.hash = '#' + t;
                    }
                }), t.history = new R();
                var V = function (e, t) {
                    var i, r = this;
                    i = e && n.has(e, 'constructor') ? e.constructor : function () {
                        return r.apply(this, arguments);
                    }, n.extend(i, r, t);
                    var o = function () {
                        this.constructor = i;
                    };
                    return o.prototype = r.prototype, i.prototype = new o(), e && n.extend(i.prototype, e), i.__super__ = r.prototype, i;
                };
                f.extend = g.extend = _.extend = y.extend = R.extend = V;
                var K = function () {
                        throw new Error('A "url" property or function must be specified');
                    }, N = function (e, t) {
                        var n = t.error;
                        t.error = function (i) {
                            n && n(e, i, t), e.trigger('error', e, i, t);
                        };
                    };
                return t;
            }), CKFinder.define('CKFinder/Config', [], function () {
                'use strict';
                var e = {
                    id: '',
                    configPath: 'config.js',
                    language: '',
                    languages: {
                        az: 1,
                        bg: 1,
                        bs: 1,
                        ca: 1,
                        cs: 1,
                        cy: 1,
                        da: 1,
                        de: 1,
                        'de-ch': 1,
                        el: 1,
                        en: 1,
                        eo: 1,
                        es: 1,
                        'es-mx': 1,
                        et: 1,
                        eu: 1,
                        fa: 1,
                        fi: 1,
                        fr: 1,
                        gu: 1,
                        he: 1,
                        hi: 1,
                        hr: 1,
                        hu: 1,
                        it: 1,
                        ja: 1,
                        ko: 1,
                        ku: 1,
                        lt: 1,
                        lv: 1,
                        nb: 1,
                        nl: 1,
                        nn: 1,
                        no: 1,
                        pl: 1,
                        'pt-br': 1,
                        ro: 1,
                        ru: 1,
                        sk: 1,
                        sl: 1,
                        sr: 1,
                        sv: 1,
                        tr: 1,
                        uk: 1,
                        'uz-cyrl': 1,
                        'uz-latn': 1,
                        vi: 1,
                        'zh-cn': 1,
                        'zh-tw': 1
                    },
                    defaultLanguage: 'en',
                    removeModules: '',
                    plugins: '',
                    tabIndex: 0,
                    resourceType: null,
                    type: null,
                    startupPath: '',
                    startupFolderExpanded: !0,
                    readOnly: !1,
                    readOnlyExclude: '',
                    connectorPath: '',
                    connectorLanguage: 'php',
                    pass: '',
                    connectorInfo: '',
                    dialogMinWidth: '18em',
                    dialogMinHeight: '4em',
                    dialogFocusItem: !0,
                    dialogOverlaySwatch: !1,
                    loaderOverlaySwatch: !1,
                    width: '100%',
                    height: 400,
                    fileIcons: {
                        default: 'unknown.png',
                        folder: 'directory.png',
                        '7z': '7z.png',
                        accdb: 'access.png',
                        avi: 'video.png',
                        bmp: 'image.png',
                        css: 'css.png',
                        csv: 'csv.png',
                        doc: 'msword.png',
                        docx: 'msword.png',
                        flac: 'audio.png',
                        gif: 'image.png',
                        gz: 'tar.png',
                        htm: 'html.png',
                        html: 'html.png',
                        jpeg: 'image.png',
                        jpg: 'image.png',
                        js: 'javascript.png',
                        log: 'log.png',
                        mp3: 'audio.png',
                        mp4: 'video.png',
                        odg: 'draw.png',
                        odp: 'impress.png',
                        ods: 'calc.png',
                        odt: 'writer.png',
                        ogg: 'audio.png',
                        opus: 'audio.png',
                        pdf: 'pdf.png',
                        php: 'php.png',
                        png: 'image.png',
                        ppt: 'powerpoint.png',
                        pptx: 'powerpoint.png',
                        rar: 'rar.png',
                        README: 'readme.png',
                        rtf: 'rtf.png',
                        sql: 'sql.png',
                        tar: 'tar.png',
                        tiff: 'image.png',
                        txt: 'plain.png',
                        wav: 'audio.png',
                        weba: 'audio.png',
                        webm: 'video.png',
                        xls: 'excel.png',
                        xlsx: 'excel.png',
                        zip: 'zip.png'
                    },
                    fileIconsPath: 'skins/core/file-icons/',
                    fileIconsSizes: '256,128,64,48,32,22,16',
                    defaultDisplayFileName: !0,
                    defaultDisplayDate: !0,
                    defaultDisplayFileSize: !0,
                    defaultViewType: 'thumbnails',
                    defaultSortBy: 'name',
                    defaultSortByOrder: 'asc',
                    listViewIconSize: 22,
                    compactViewIconSize: 22,
                    thumbnailDelay: 50,
                    thumbnailDefaultSize: 150,
                    thumbnailMinSize: null,
                    thumbnailMaxSize: null,
                    thumbnailSizeStep: 2,
                    thumbnailClasses: {
                        120: 'small',
                        180: 'medium'
                    },
                    chooseFiles: !1,
                    chooseFilesOnDblClick: !0,
                    chooseFilesClosePopup: !0,
                    resizeImages: !0,
                    rememberLastFolder: !0,
                    skin: 'moono',
                    swatch: 'a',
                    displayFoldersPanel: !0,
                    jquery: 'libs/jquery.js',
                    jqueryMobile: 'libs/jquery.mobile.js',
                    jqueryMobileStructureCSS: 'libs/jquery.mobile.structure.css',
                    jqueryMobileIconsCSS: '',
                    iconsCSS: '',
                    themeCSS: '',
                    coreCSS: 'skins/core/ckfinder.css',
                    primaryPanelWidth: '',
                    secondaryPanelWidth: '',
                    cors: !1,
                    corsSelect: !1,
                    editImageMode: '',
                    editImageAdjustments: [
                        'brightness',
                        'contrast',
                        'exposure',
                        'saturation',
                        'sepia',
                        'sharpen'
                    ],
                    editImagePresets: [
                        'clarity',
                        'herMajesty',
                        'nostalgia',
                        'pinhole',
                        'sunrise',
                        'vintage'
                    ],
                    autoCloseHTML5Upload: 5,
                    uiModeThreshold: 48
                };
                return e;
            }), CKFinder.define('CKFinder/Event', [], function () {
                'use strict';
                function e() {
                }
                function t(e) {
                    var t = e.getPrivate && e.getPrivate() || e._ev || (e._ev = {});
                    return t.events || (t.events = {});
                }
                function n(e) {
                    this.name = e, this.listeners = [];
                }
                function i(e) {
                    var i = t(this);
                    return i[e] || (i[e] = new n(e));
                }
                return n.prototype = {
                    getListenerIndex: function (e) {
                        for (var t = 0, n = this.listeners; t < n.length; t++)
                            if (n[t].fn === e)
                                return t;
                        return -1;
                    }
                }, e.prototype = {
                    on: function (e, t, n, r, o) {
                        function s(i, o, s, l) {
                            var u = {
                                    name: e,
                                    sender: this,
                                    finder: i,
                                    data: o,
                                    listenerData: r,
                                    stop: s,
                                    cancel: l,
                                    removeListener: a
                                }, c = t.call(n, u);
                            return c !== !1 && u.data;
                        }
                        function a() {
                            d.removeListener(e, t);
                        }
                        var l, u, c = i.call(this, e), d = this;
                        if (c.getListenerIndex(t) < 0) {
                            for (l = c.listeners, n || (n = this), isNaN(o) && (o = 10), s.fn = t, s.priority = o, u = l.length - 1; u >= 0; u--)
                                if (l[u].priority <= o)
                                    return l.splice(u + 1, 0, s), { removeListener: a };
                            l.unshift(s);
                        }
                        return { removeListener: a };
                    },
                    once: function () {
                        var e = arguments[1];
                        return arguments[1] = function (t) {
                            return t.removeListener(), e.apply(this, arguments);
                        }, this.on.apply(this, arguments);
                    },
                    fire: function () {
                        var e = 0, n = function () {
                                e = 1;
                            }, i = 0, r = function () {
                                i = 1;
                            };
                        return function (o, s, a) {
                            var l, u, c, d, f = t(this)[o], S = e, h = i;
                            if (e = 0, i = 0, f && (c = f.listeners, c.length))
                                for (c = c.slice(0), l = 0; l < c.length; l++) {
                                    if (f.errorProof)
                                        try {
                                            d = c[l].call(this, a, s, n, r);
                                        } catch (e) {
                                        }
                                    else
                                        d = c[l].call(this, a, s, n, r);
                                    if (d === !1 ? i = 1 : 'undefined' != typeof d && (s = d), e || i)
                                        break;
                                }
                            return u = !i && ('undefined' == typeof s || s), e = S, i = h, u;
                        };
                    }(),
                    fireOnce: function (e, n, i) {
                        var r = this.fire(e, n, i);
                        return delete t(this)[e], r;
                    },
                    removeListener: function (e, n) {
                        var i, r = t(this)[e];
                        r && (i = r.getListenerIndex(n), i >= 0 && r.listeners.splice(i, 1));
                    },
                    removeAllListeners: function () {
                        var e, n = t(this);
                        for (e in n)
                            delete n[e];
                    },
                    hasListeners: function (e) {
                        var n = t(this)[e];
                        return n && n.listeners.length > 0;
                    }
                }, e;
            }), CKFinder.define('CKFinder/Util/Util', ['underscore'], function (e) {
                'use strict';
                var t = {
                    url: function (e) {
                        return /^(http(s)?:)?\/\/.+/i.test(e) ? e : CKFinder.require.toUrl(e);
                    },
                    asyncArrayTraverse: function (e, t, n) {
                        var i, r = 50, o = 10, s = 0;
                        n || (n = null), t = t.bind(n), (i = function () {
                            for (var n, a = 0, l = new Date().getTime();;) {
                                if (n = e.item ? e.item(s) : e[s], !n || t(n, s, e) === !1)
                                    return;
                                if (s += 1, a += 1, a >= o && new Date().getTime() - l > r)
                                    return setTimeout(i, r);
                            }
                        }).call();
                    },
                    isPopup: function () {
                        return window !== window.parent && !!window.opener || window.isCKFinderPopup;
                    },
                    isModal: function () {
                        return window.parent.CKFinder && window.parent.CKFinder.modal && window.parent.CKFinder.modal('visible');
                    },
                    isWidget: function () {
                        return window !== window.parent && !window.opener;
                    },
                    toGet: function (t) {
                        var n = '';
                        return e.forOwn(t, function (e, i) {
                            n += '&' + encodeURIComponent(i) + '=' + encodeURIComponent(t[i]);
                        }), n.substring(1);
                    },
                    cssEntities: function (e) {
                        return e.replace(/\(/g, '&#92;&#40;').replace(/\)/g, '&#92;&#41;');
                    },
                    jsCssEntities: function (e) {
                        return e.replace(/\(/g, '%28').replace(/\)/g, '%29');
                    },
                    getUrlParams: function () {
                        var e = {};
                        return window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (t, n, i) {
                            e[n] = i;
                        }), e;
                    },
                    parentFolder: function (e) {
                        return e.split('/').slice(0, -1).join('/');
                    },
                    isShortcut: function (t, n) {
                        var i = n.split('+'), r = !!t.ctrlKey || !!t.metaKey, o = !!t.altKey, s = !!t.shiftKey, a = r === !!e.contains(i, 'ctrl'), l = o === !!e.contains(i, 'alt'), u = s === !!e.contains(i, 'shift');
                        return a && l && u;
                    },
                    randomString: function (e, t) {
                        t || (t = 'abcdefghijklmnopqrstuvwxyz0123456789');
                        for (var n = '', i = 0; i < e; i++)
                            n += t.charAt(Math.floor(Math.random() * t.length));
                        return n;
                    },
                    escapeHtml: function (e) {
                        var t = {
                            '&': '&amp;',
                            '<': '&lt;',
                            '>': '&gt;',
                            '"': '&quot;',
                            '\'': '&#039;'
                        };
                        return e.replace(/[&<>"']/g, function (e) {
                            return t[e];
                        });
                    }
                };
                return t;
            }), CKFinder.define('CKFinder/Util/Lang', [
                'underscore',
                'jquery',
                'ckf_global'
            ], function (e, t, n) {
                'use strict';
                function i(e, t, i, o) {
                    function s(t) {
                        o(e, JSON.parse(t));
                    }
                    function a() {
                        o(e);
                    }
                    e || (e = r.getSupportedLanguage(navigator.userLanguage || navigator.language, i)), i[t] || (t = 'en');
                    var l, u = 'lang/' + t + '.json';
                    i[e] && (l = 'lang/' + e + '.json'), l || (l = u), n.require(['text!' + n.require.toUrl(l) + '?ver=i42irv'], s, a);
                }
                var r = {
                    loadPluginLang: function (t, i, r, o) {
                        var s, a = r.lang.split(',');
                        if (e.indexOf(a, t) >= 0)
                            s = t;
                        else {
                            if (!(e.indexOf(a, i) >= 0))
                                return void o({});
                            s = i;
                        }
                        n.require(['text!' + n.require.toUrl(r.path) + 'lang/' + s + '.json'], function (e) {
                            var t;
                            try {
                                t = JSON.parse(e);
                            } catch (e) {
                                t = {};
                            }
                            o(t);
                        }, function () {
                            o({});
                        });
                    },
                    init: function (n) {
                        var r = new t.Deferred();
                        return i(n.language, n.defaultLanguage, n.languages, function (t, n) {
                            if (!n)
                                return void r.reject();
                            var i = n;
                            i.formatDate = function () {
                                var e = '[\'' + i.units.dateAmPm.join('\',\'') + '\']', t = i.units.dateFormat.replace(/dd|mm|yyyy|hh|HH|MM|aa|d|m|yy|h|H|M|a/g, function (t) {
                                        var n = {
                                            d: 'day.replace(/^0/,\'\')',
                                            dd: 'day',
                                            m: 'month.replace(/^0/,\'\')',
                                            mm: 'month',
                                            yy: 'year.substr(2)',
                                            yyyy: 'year',
                                            H: 'hour.replace(/^0/,\'\')',
                                            HH: 'hour',
                                            h: 'parseInt( hour ) === 0 && parseInt( minute ) === 0 ?' + ' \'12\' ' + ':' + ' ( ( hour <= 12 ? hour : ( ( hour - 12 ) + 100 ).toString().substr( 1 ) ).replace(/^0/,\'\') )',
                                            hh: 'parseInt( hour ) === 0 && parseInt( minute ) === 0 ?' + ' \'12\' ' + ':' + ' ( ( hour <= 12 ? hour : ( ( hour - 12 ) + 100 ).toString().substr( 1 ) ) )',
                                            M: 'minute.replace(/^0/,\'\')',
                                            MM: 'minute',
                                            a: e + '[ hour < 12 ? 0 : 1 ].charAt(0)',
                                            aa: e + '[ hour < 12 ? 0 : 1 ]'
                                        };
                                        return '\',' + n[t] + ',\'';
                                    });
                                return t = '\'' + t + '\'', t = t.replace(/('',)|,''$/g, ''), new Function('year', 'month', 'day', 'hour', 'minute', 'return [' + t + '].join("");');
                            }(), i.formatDateString = function (t) {
                                return t = t || '', e.isNumber(t) && (t = t.toString()), t.length < 12 ? '' : i.formatDate(t.substr(0, 4), t.substr(4, 2), t.substr(6, 2), t.substr(8, 2), t.substr(10, 2));
                            }, i.formatFileSize = function (e) {
                                var t = 1024, n = t * t, r = n * t;
                                return e >= r ? i.units.gb.replace('{size}', (e / r).toFixed(1)) : e >= n ? i.units.mb.replace('{size}', (e / n).toFixed(1)) : e >= t ? i.units.kb.replace('{size}', (e / t).toFixed(1)) : '{size} B'.replace('{size}', e);
                            }, i.formatTransfer = function (e) {
                                return i.units.sizePerSecond.replace('{size}', i.formatFileSize(parseInt(e)));
                            }, i.formatFilesCount = function (e) {
                                return i.files[1 === e ? 'countOne' : 'countMany'].replace('{count}', e);
                            }, r.resolve(i);
                        }), r.promise();
                    },
                    getSupportedLanguage: function (e, t) {
                        if (!e)
                            return !1;
                        var n = e.toLowerCase().match(/([a-z]+)(?:-([a-z]+))?/), i = n[1], r = n[2];
                        return t[i + '-' + r] ? i = i + '-' + r : t[i] || (i = !1), i;
                    }
                };
                return r;
            }), CKFinder.define('CKFinder/Util/KeyCode', {
                up: 38,
                down: 40,
                left: 37,
                right: 39,
                backspace: 8,
                tab: 9,
                enter: 13,
                space: 32,
                escape: 27,
                end: 35,
                home: 36,
                delete: 46,
                menu: 93,
                slash: 191,
                a: 65,
                r: 82,
                u: 85,
                f2: 113,
                f5: 116,
                f7: 118,
                f8: 119,
                f9: 120,
                f10: 121
            }), CKFinder.define('CKFinder/UI/UIHacks', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'ckf-jquery-mobile'
            ], function (e, t, n) {
                'use strict';
                function i() {
                    var n = ['transition'];
                    e.forEach(n, function (e) {
                        o(e) && t('body').addClass('ckf-feature-css-' + e);
                    });
                }
                function r(e) {
                    var n = void 0 === document.documentMode, i = window.chrome;
                    n && !i ? t(window).on('focusin', function (t) {
                        t.target === window && setTimeout(function () {
                            e.fire('ui:focus', null, e);
                        }, a);
                    }).on('focusout', function (t) {
                        t.target === window && e.fire('ui:blur', null, e);
                    }) : window.addEventListener ? (window.addEventListener('focus', function () {
                        setTimeout(function () {
                            e.fire('ui:focus', null, e);
                        }, a);
                    }, !1), window.addEventListener('blur', function () {
                        e.fire('ui:blur', null, e);
                    }, !1)) : (window.attachEvent('focus', function () {
                        setTimeout(function () {
                            e.fire('ui:focus', null, e);
                        }, a);
                    }), window.attachEvent('blur', function () {
                        e.fire('ui:blur', null, e);
                    }));
                }
                function o(e) {
                    var t = document.body || document.documentElement, n = t.style;
                    if ('string' == typeof n[e])
                        return !0;
                    var i = [
                        'Moz',
                        'webkit',
                        'Webkit',
                        'Khtml',
                        'O',
                        'ms'
                    ];
                    e = e.charAt(0).toUpperCase() + e.substr(1);
                    for (var r = 0; r < i.length; r++)
                        if ('string' == typeof n[i[r] + e])
                            return !0;
                    return !1;
                }
                function s(e, t, n) {
                    t && e.removeClass('ckf-ui-mode-' + t), e.addClass('ckf-ui-mode-' + n);
                }
                var a = 300;
                return {
                    init: function (e) {
                        i(), r(e);
                        var o = t('body');
                        o.attr({
                            'data-theme': e.config.swatch,
                            role: 'application'
                        }), navigator.userAgent.toLowerCase().indexOf('trident/') > -1 && o.addClass('ckf-ie'), t('html').attr({
                            dir: e.lang.dir,
                            lang: e.lang.langCode
                        }), e.lang.dir !== 'ltr' && o.addClass('ckf-rtl'), e.setHandler('ui:getMode', function () {
                            var n, i, r = window.matchMedia ? function () {
                                    return void 0 === i && (i = '(max-width: ' + e.config.uiModeThreshold + 'em)'), window.matchMedia(i).matches;
                                } : function () {
                                    return void 0 === n && (n = parseFloat(t('body').css('font-size')) * e.config.uiModeThreshold), window.innerWidth <= n;
                                };
                            return function () {
                                return r.call(this) ? 'mobile' : 'desktop';
                            };
                        }());
                        var a = e.request('ui:getMode');
                        s(o, null, a), t(window).bind('throttledresize', function () {
                            var t = e.request('ui:getMode'), n = a !== t;
                            n && (s(o, a, t), a = t), e.fire('ui:resize', {
                                modeChanged: n,
                                mode: a
                            }, e);
                        });
                        var l = t.event.special.swipe.start;
                        t.event.special.swipe.start = function (e) {
                            var t = l(e);
                            return t.ckfOrigin = e.originalEvent.type, t;
                        }, t(window).bind('swipeleft', function (t) {
                            0 !== t.swipestart.ckfOrigin.indexOf('mouse') && e.fire('ui:swipeleft', { evt: t }, e);
                        }), t(window).bind('swiperight', function (t) {
                            0 !== t.swipestart.ckfOrigin.indexOf('mouse') && e.fire('ui:swiperight', { evt: t }, e);
                        }), e.setHandler('closePopup', function () {
                            e.util.isPopup() ? window.close() : window.top && window.top.CKFinder && window.top.CKFinder.modal && window.top.CKFinder.modal('close');
                        }), t(document).on('selectstart', '[draggable]', function (e) {
                            e.preventDefault(), e.dragDrop && e.dragDrop();
                        }), e.once('app:ready', function (e) {
                            e.finder.request('key:listen', { key: n.space }), e.finder.on('keydown:' + n.space, function (e) {
                                e.data.evt.preventDefault();
                            });
                        });
                    }
                };
            }), CKFinder.define('CKFinder/Plugins/Plugin', [
                'underscore',
                'jquery',
                'backbone'
            ], function (e, t, n) {
                'use strict';
                function i() {
                }
                return i.extend = n.Model.extend, e.extend(i.prototype, {
                    addCss: function (e) {
                        t('<style>').text(e).appendTo('head');
                    },
                    init: function () {
                    }
                }), i;
            }), CKFinder.define('CKFinder/Plugins/Plugins', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Plugins/Plugin',
                'CKFinder/Util/Lang'
            ], function (e, t, n, i, r) {
                'use strict';
                function o(e, t, n) {
                    function i() {
                        t.init(e), e._plugins.add(t), n.loaded = !0, e.fire('plugin:ready', { plugin: t }, e);
                    }
                    return t.path = e.util.parentFolder(n.url) + '/', t.lang ? void r.loadPluginLang(e.lang.langCode, e.config.defaultLanguage, t, function (t) {
                        t.name && t.values && (e.lang[t.name] = t.values), i();
                    }) : void i();
                }
                var s = n.Collection.extend({
                    load: function (t) {
                        function n() {
                            var n = e.countBy(r, 'loaded');
                            n.undefined || (t.fire('plugin:allReady', null, t), n.false && e.forEach(e.where(r, { loaded: !1 }), function (e) {
                                t.fire('plugin:loadError', {
                                    configKey: e.config,
                                    url: e.url
                                });
                            }));
                        }
                        var r = [], s = t.config.plugins;
                        return s.length < 1 ? void t.fire('plugin:allReady', null, t) : (e.isString(s) && (s = s.split(',')), e.forEach(s, function (e) {
                            var t = e;
                            e.search('/') === -1 && (t = CKFinder.require.toUrl('plugins/' + e + '/' + e + '.js')), r.push({
                                config: e,
                                url: t,
                                loaded: void 0
                            });
                        }), t.on('plugin:ready', function () {
                            n();
                        }), void e.forEach(r, function (e) {
                            CKFinder.require([e.url], function (n) {
                                var r = i.extend(n);
                                o(t, new r(), e);
                            }, function () {
                                e.loaded = !1, n();
                            });
                        }));
                    }
                });
                return s;
            }), CKFinder.define('CKFinder/Modules/CsrfTokenManager/CsrfTokenManager', [], function () {
                'use strict';
                function e(e) {
                    e.setHandler('csrf:getToken', t), e.setHandler('internal:csrf:setParentWindowToken', function (e) {
                        a = e.token;
                    });
                }
                function t() {
                    if (a)
                        return a;
                    var e = n(o);
                    return e.length != s && (e = r(s), i(o, e)), e;
                }
                function n(e) {
                    e = e.toLowerCase();
                    for (var t = window.document.cookie.split(';'), n = 0; n < t.length; n++) {
                        var i = t[n].split('='), r = decodeURIComponent(i[0].trim().toLowerCase()), o = i.length > 1 ? i[1] : '';
                        if (r === e)
                            return decodeURIComponent(o);
                    }
                    return '';
                }
                function i(e, t) {
                    window.document.cookie = encodeURIComponent(e) + '=' + encodeURIComponent(t) + ';path=/';
                }
                function r(e) {
                    var t = 'abcdefghijklmnopqrstuvwxyz0123456789', n = [], i = '';
                    if (window.crypto && window.crypto.getRandomValues)
                        n = new Uint8Array(e), window.crypto.getRandomValues(n);
                    else
                        for (var r = 0; r < e; r++)
                            n.push(Math.floor(256 * Math.random()));
                    for (var o = 0; o < n.length; o++) {
                        var s = t.charAt(n[o] % t.length);
                        i += Math.random() > 0.5 ? s.toUpperCase() : s;
                    }
                    return i;
                }
                var o = 'ckCsrfToken', s = 40, a = null;
                return e;
            }), CKFinder.define('CKFinder/Modules/Connector/Transport', [
                'jquery',
                'underscore'
            ], function (e, t) {
                'use strict';
                function n(e, t) {
                    this.url = e, this.config = t, this.onDone = o, this.onFail = o, this.request = null;
                }
                function i(t) {
                    var n, i;
                    n = new XDomainRequest(), i = null, t.config.type === 'post' && (i = e.param(t.config.post)), n.open(t.config.type, t.url), n.onload = function () {
                        t.onDone(this.responseText);
                    }, n.onprogress = o, n.ontimeout = o, n.onerror = function () {
                        t.onFail();
                    }, t.request = n, setTimeout(function () {
                        n.send(i);
                    }, 0);
                }
                function r(n) {
                    var i, r;
                    i = new XMLHttpRequest(), r = null, i.open(n.config.type, n.url, !0), i.onreadystatechange = function () {
                        4 === this.readyState && n.onDone(this.responseText);
                    }, i.onerror = function () {
                        n.onFail();
                    }, t.isFunction(n.config.uploadProgress) && i.upload && (i.upload.onprogress = n.config.uploadProgress), t.isFunction(n.config.uploadEnd) && i.upload && (i.upload.onload = n.config.uploadEnd), n.config.type === 'post' && (r = e.param(t.extend(n.config.post)), i.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')), i.send(r), n.request = i;
                }
                var o = function () {
                };
                return n.prototype.done = function (e) {
                    this.onDone = e;
                }, n.prototype.fail = function (e) {
                    this.onFail = e;
                }, n.prototype.send = function () {
                    window.XMLHttpRequest ? r(this) : i(this);
                }, n.prototype.abort = function () {
                    this.request && this.request.abort();
                }, n;
            }), CKFinder.define('CKFinder/Modules/Connector/Connector', [
                'underscore',
                'jquery',
                'ckf_global',
                'CKFinder/Modules/Connector/Transport'
            ], function (e, t, n, i) {
                'use strict';
                function r(e) {
                    function t(e) {
                        if (/^(http(s)?:)?\/\/.+/i.test(e))
                            return e;
                        0 !== e.indexOf('/') && (e = '/' + e);
                        var t = window.parent ? window.parent.location : window.location, n = t.protocol + '//' + t.host;
                        return n + e;
                    }
                    var i = e.config;
                    this.finder = e, this.config = i, i.connectorPath ? this.baseUrl = t(i.connectorPath) : (this.baseUrl = n._connectors[n.connector], '/' !== this.baseUrl.charAt(0) && (this.baseUrl = n.require.toUrl('./' + this.baseUrl)), this.baseUrl = t(this.baseUrl)), e.setHandlers({
                        'command:send': {
                            callback: s,
                            context: this
                        },
                        'command:url': {
                            callback: function (e) {
                                return o.call(this, e.command, e.params, e.folder);
                            },
                            context: this
                        }
                    });
                }
                function o(t, n, i) {
                    var r = this.finder, o = r.config, s = {
                            command: t,
                            lang: r.lang.langCode
                        }, a = o.connectorInfo;
                    if (i && (s.type = i.get('resourceType'), s.currentFolder = i.getPath(), s.hash = i.getHash()), o.pass.length) {
                        var l = o.pass.split(',');
                        e.forEach(l, function (e) {
                            s[e] = r.config[e];
                        });
                    }
                    o.id && (s.id = o.id);
                    var u = this.baseUrl + '?' + r.util.toGet(e.extend(s, n));
                    return a.length > 0 && (u += '&' + a), u;
                }
                function s(n) {
                    var r = this.finder, s = n.name, l = t.Deferred(), u = {
                            name: s,
                            response: { error: { number: 109 } }
                        };
                    if (e.has(n, 'context') && (u.context = n.context), r.fire('command:before', n, r) && r.fire('command:before:' + s, n, r)) {
                        var c = e.extend({
                                type: 'get',
                                post: {}
                            }, n), d = {};
                        d.type = c.type, c.type === 'post' && (c.post.ckCsrfToken = r.request('csrf:getToken'), d.post = c.sendPostAsJson ? { jsonData: JSON.stringify(c.post) } : c.post), c.uploadProgress && (d.uploadProgress = c.uploadProgress), c.uploadEnd && (d.uploadEnd = c.uploadEnd);
                        var f = o.call(this, s, n.params, n.folder), h = new i(f, d);
                        return h.done(function (t) {
                            var i, o, c = !1;
                            try {
                                o = JSON.parse(t), i = {
                                    name: s,
                                    response: o,
                                    rawResponse: t
                                }, c = !0;
                            } catch (e) {
                                var d = u;
                                return d.response.error.message = t, a(s, d, r), void l.reject(d);
                            }
                            c && l.resolve(o), e.has(n, 'context') && (i.context = n.context), !o || o.error ? r.fire('command:error:' + s, i, r) && (n.context && n.context.silentConnectorErrors || r.fire('command:error', i, r)) : r.fire('command:ok:' + s, i, r), r.fire('command:after', i, r), r.fire('command:after:' + s, i, r);
                        }), h.fail(function () {
                            a(s, u, r), l.reject(u);
                        }), h.send(), n.returnTransport ? h : l.promise();
                    }
                }
                function a(e, t, n) {
                    n.fire('command:error:' + e, t, n) && n.fire('command:error', t, n), n.fire('command:after', t, n), n.fire('command:after:' + e, t, n);
                }
                return r;
            }), function (e, t) {
                if ('function' == typeof CKFinder.define && CKFinder.define.amd)
                    CKFinder.define('marionette', [
                        'backbone',
                        'underscore'
                    ], function (n, i) {
                        return e.Marionette = e.Mn = t(e, n, i);
                    });
                else if ('undefined' != typeof exports) {
                    var n = require('backbone'), i = require('underscore');
                    module.exports = t(e, n, i);
                } else
                    e.Marionette = e.Mn = t(e, e.Backbone, e._);
            }(this, function (e, t, n) {
                'use strict';
                !function (e, t) {
                    var n = e.ChildViewContainer;
                    return e.ChildViewContainer = function (e, t) {
                        var n = function (e) {
                            this._views = {}, this._indexByModel = {}, this._indexByCustom = {}, this._updateLength(), t.each(e, this.add, this);
                        };
                        t.extend(n.prototype, {
                            add: function (e, t) {
                                var n = e.cid;
                                return this._views[n] = e, e.model && (this._indexByModel[e.model.cid] = n), t && (this._indexByCustom[t] = n), this._updateLength(), this;
                            },
                            findByModel: function (e) {
                                return this.findByModelCid(e.cid);
                            },
                            findByModelCid: function (e) {
                                var t = this._indexByModel[e];
                                return this.findByCid(t);
                            },
                            findByCustom: function (e) {
                                var t = this._indexByCustom[e];
                                return this.findByCid(t);
                            },
                            findByIndex: function (e) {
                                return t.values(this._views)[e];
                            },
                            findByCid: function (e) {
                                return this._views[e];
                            },
                            remove: function (e) {
                                var n = e.cid;
                                return e.model && delete this._indexByModel[e.model.cid], t.any(this._indexByCustom, function (e, t) {
                                    if (e === n)
                                        return delete this._indexByCustom[t], !0;
                                }, this), delete this._views[n], this._updateLength(), this;
                            },
                            call: function (e) {
                                this.apply(e, t.tail(arguments));
                            },
                            apply: function (e, n) {
                                t.each(this._views, function (i) {
                                    t.isFunction(i[e]) && i[e].apply(i, n || []);
                                });
                            },
                            _updateLength: function () {
                                this.length = t.size(this._views);
                            }
                        });
                        var i = [
                            'forEach',
                            'each',
                            'map',
                            'find',
                            'detect',
                            'filter',
                            'select',
                            'reject',
                            'every',
                            'all',
                            'some',
                            'any',
                            'include',
                            'contains',
                            'invoke',
                            'toArray',
                            'first',
                            'initial',
                            'rest',
                            'last',
                            'without',
                            'isEmpty',
                            'pluck',
                            'reduce'
                        ];
                        return t.each(i, function (e) {
                            n.prototype[e] = function () {
                                var n = t.values(this._views), i = [n].concat(t.toArray(arguments));
                                return t[e].apply(t, i);
                            };
                        }), n;
                    }(e, t), e.ChildViewContainer.VERSION = '0.1.11', e.ChildViewContainer.noConflict = function () {
                        return e.ChildViewContainer = n, this;
                    }, e.ChildViewContainer;
                }(t, n), function (e, t) {
                    var n = e.Wreqr, i = e.Wreqr = {};
                    return e.Wreqr.VERSION = '1.3.6', e.Wreqr.noConflict = function () {
                        return e.Wreqr = n, this;
                    }, i.Handlers = function (e, t) {
                        var n = function (e) {
                            this.options = e, this._wreqrHandlers = {}, t.isFunction(this.initialize) && this.initialize(e);
                        };
                        return n.extend = e.Model.extend, t.extend(n.prototype, e.Events, {
                            setHandlers: function (e) {
                                t.each(e, function (e, n) {
                                    var i = null;
                                    t.isObject(e) && !t.isFunction(e) && (i = e.context, e = e.callback), this.setHandler(n, e, i);
                                }, this);
                            },
                            setHandler: function (e, t, n) {
                                var i = {
                                    callback: t,
                                    context: n
                                };
                                this._wreqrHandlers[e] = i, this.trigger('handler:add', e, t, n);
                            },
                            hasHandler: function (e) {
                                return !!this._wreqrHandlers[e];
                            },
                            getHandler: function (e) {
                                var t = this._wreqrHandlers[e];
                                if (t)
                                    return function () {
                                        return t.callback.apply(t.context, arguments);
                                    };
                            },
                            removeHandler: function (e) {
                                delete this._wreqrHandlers[e];
                            },
                            removeAllHandlers: function () {
                                this._wreqrHandlers = {};
                            }
                        }), n;
                    }(e, t), i.CommandStorage = function () {
                        var n = function (e) {
                            this.options = e, this._commands = {}, t.isFunction(this.initialize) && this.initialize(e);
                        };
                        return t.extend(n.prototype, e.Events, {
                            getCommands: function (e) {
                                var t = this._commands[e];
                                return t || (t = {
                                    command: e,
                                    instances: []
                                }, this._commands[e] = t), t;
                            },
                            addCommand: function (e, t) {
                                var n = this.getCommands(e);
                                n.instances.push(t);
                            },
                            clearCommands: function (e) {
                                var t = this.getCommands(e);
                                t.instances = [];
                            }
                        }), n;
                    }(), i.Commands = function (e, t) {
                        return e.Handlers.extend({
                            storageType: e.CommandStorage,
                            constructor: function (t) {
                                this.options = t || {}, this._initializeStorage(this.options), this.on('handler:add', this._executeCommands, this), e.Handlers.prototype.constructor.apply(this, arguments);
                            },
                            execute: function (e) {
                                e = arguments[0];
                                var n = t.rest(arguments);
                                this.hasHandler(e) ? this.getHandler(e).apply(this, n) : this.storage.addCommand(e, n);
                            },
                            _executeCommands: function (e, n, i) {
                                var r = this.storage.getCommands(e);
                                t.each(r.instances, function (e) {
                                    n.apply(i, e);
                                }), this.storage.clearCommands(e);
                            },
                            _initializeStorage: function (e) {
                                var n, i = e.storageType || this.storageType;
                                n = t.isFunction(i) ? new i() : i, this.storage = n;
                            }
                        });
                    }(i, t), i.RequestResponse = function (e, t) {
                        return e.Handlers.extend({
                            request: function (e) {
                                if (this.hasHandler(e))
                                    return this.getHandler(e).apply(this, t.rest(arguments));
                            }
                        });
                    }(i, t), i.EventAggregator = function (e, t) {
                        var n = function () {
                        };
                        return n.extend = e.Model.extend, t.extend(n.prototype, e.Events), n;
                    }(e, t), i.Channel = function (n) {
                        var i = function (t) {
                            this.vent = new e.Wreqr.EventAggregator(), this.reqres = new e.Wreqr.RequestResponse(), this.commands = new e.Wreqr.Commands(), this.channelName = t;
                        };
                        return t.extend(i.prototype, {
                            reset: function () {
                                return this.vent.off(), this.vent.stopListening(), this.reqres.removeAllHandlers(), this.commands.removeAllHandlers(), this;
                            },
                            connectEvents: function (e, t) {
                                return this._connect('vent', e, t), this;
                            },
                            connectCommands: function (e, t) {
                                return this._connect('commands', e, t), this;
                            },
                            connectRequests: function (e, t) {
                                return this._connect('reqres', e, t), this;
                            },
                            _connect: function (e, n, i) {
                                if (n) {
                                    i = i || this;
                                    var r = e === 'vent' ? 'on' : 'setHandler';
                                    t.each(n, function (n, o) {
                                        this[e][r](o, t.bind(n, i));
                                    }, this);
                                }
                            }
                        }), i;
                    }(i), i.radio = function (e, t) {
                        var n = function () {
                            this._channels = {}, this.vent = {}, this.commands = {}, this.reqres = {}, this._proxyMethods();
                        };
                        t.extend(n.prototype, {
                            channel: function (e) {
                                if (!e)
                                    throw new Error('Channel must receive a name');
                                return this._getChannel(e);
                            },
                            _getChannel: function (t) {
                                var n = this._channels[t];
                                return n || (n = new e.Channel(t), this._channels[t] = n), n;
                            },
                            _proxyMethods: function () {
                                t.each([
                                    'vent',
                                    'commands',
                                    'reqres'
                                ], function (e) {
                                    t.each(i[e], function (t) {
                                        this[e][t] = r(this, e, t);
                                    }, this);
                                }, this);
                            }
                        });
                        var i = {
                                vent: [
                                    'on',
                                    'off',
                                    'trigger',
                                    'once',
                                    'stopListening',
                                    'listenTo',
                                    'listenToOnce'
                                ],
                                commands: [
                                    'execute',
                                    'setHandler',
                                    'setHandlers',
                                    'removeHandler',
                                    'removeAllHandlers'
                                ],
                                reqres: [
                                    'request',
                                    'setHandler',
                                    'setHandlers',
                                    'removeHandler',
                                    'removeAllHandlers'
                                ]
                            }, r = function (e, n, i) {
                                return function (r) {
                                    var o = e._getChannel(r)[n];
                                    return o[i].apply(o, t.rest(arguments));
                                };
                            };
                        return new n();
                    }(i, t), e.Wreqr;
                }(t, n);
                var i = e.Marionette, r = e.Mn, o = t.Marionette = {};
                o.VERSION = '2.4.7', o.noConflict = function () {
                    return e.Marionette = i, e.Mn = r, this;
                }, t.Marionette = o, o.Deferred = t.$.Deferred, o.extend = t.Model.extend, o.isNodeAttached = function (e) {
                    return t.$.contains(document.documentElement, e);
                }, o.mergeOptions = function (e, t) {
                    e && n.extend(this, n.pick(e, t));
                }, o.getOption = function (e, t) {
                    if (e && t)
                        return e.options && void 0 !== e.options[t] ? e.options[t] : e[t];
                }, o.proxyGetOption = function (e) {
                    return o.getOption(this, e);
                }, o._getValue = function (e, t, i) {
                    return n.isFunction(e) && (e = i ? e.apply(t, i) : e.call(t)), e;
                }, o.normalizeMethods = function (e) {
                    return n.reduce(e, function (e, t, i) {
                        return n.isFunction(t) || (t = this[t]), t && (e[i] = t), e;
                    }, {}, this);
                }, o.normalizeUIString = function (e, t) {
                    return e.replace(/@ui\.[a-zA-Z-_$0-9]*/g, function (e) {
                        return t[e.slice(4)];
                    });
                }, o.normalizeUIKeys = function (e, t) {
                    return n.reduce(e, function (e, n, i) {
                        var r = o.normalizeUIString(i, t);
                        return e[r] = n, e;
                    }, {});
                }, o.normalizeUIValues = function (e, t, i) {
                    return n.each(e, function (r, s) {
                        n.isString(r) ? e[s] = o.normalizeUIString(r, t) : n.isObject(r) && n.isArray(i) && (n.extend(r, o.normalizeUIValues(n.pick(r, i), t)), n.each(i, function (e) {
                            var i = r[e];
                            n.isString(i) && (r[e] = o.normalizeUIString(i, t));
                        }));
                    }), e;
                }, o.actAsCollection = function (e, t) {
                    var i = [
                        'forEach',
                        'each',
                        'map',
                        'find',
                        'detect',
                        'filter',
                        'select',
                        'reject',
                        'every',
                        'all',
                        'some',
                        'any',
                        'include',
                        'contains',
                        'invoke',
                        'toArray',
                        'first',
                        'initial',
                        'rest',
                        'last',
                        'without',
                        'isEmpty',
                        'pluck'
                    ];
                    n.each(i, function (i) {
                        e[i] = function () {
                            var e = n.values(n.result(this, t)), r = [e].concat(n.toArray(arguments));
                            return n[i].apply(n, r);
                        };
                    });
                };
                var s = o.deprecate = function (e, t) {
                    n.isObject(e) && (e = e.prev + ' is going to be removed in the future. ' + 'Please use ' + e.next + ' instead.' + (e.url ? ' See: ' + e.url : '')), void 0 !== t && t || s._cache[e] || (s._warn('Deprecation warning: ' + e), s._cache[e] = !0);
                };
                s._console = 'undefined' != typeof console ? console : {}, s._warn = function () {
                    var e = s._console.warn || s._console.log || function () {
                    };
                    return e.apply(s._console, arguments);
                }, s._cache = {}, o._triggerMethod = function () {
                    function e(e, t, n) {
                        return n.toUpperCase();
                    }
                    var t = /(^|:)(\w)/gi;
                    return function (i, r, o) {
                        var s = arguments.length < 3;
                        s && (o = r, r = o[0]);
                        var a, l = 'on' + r.replace(t, e), u = i[l];
                        return n.isFunction(u) && (a = u.apply(i, s ? n.rest(o) : o)), n.isFunction(i.trigger) && (s + o.length > 1 ? i.trigger.apply(i, s ? o : [r].concat(n.drop(o, 0))) : i.trigger(r)), a;
                    };
                }(), o.triggerMethod = function (e) {
                    return o._triggerMethod(this, arguments);
                }, o.triggerMethodOn = function (e) {
                    var t = n.isFunction(e.triggerMethod) ? e.triggerMethod : o.triggerMethod;
                    return t.apply(e, n.rest(arguments));
                }, o.MonitorDOMRefresh = function (e) {
                    function t() {
                        e._isShown = !0, i();
                    }
                    function n() {
                        e._isRendered = !0, i();
                    }
                    function i() {
                        e._isShown && e._isRendered && o.isNodeAttached(e.el) && o.triggerMethodOn(e, 'dom:refresh', e);
                    }
                    e._isDomRefreshMonitored || (e._isDomRefreshMonitored = !0, e.on({
                        show: t,
                        render: n
                    }));
                }, function (e) {
                    function t(t, i, r, o) {
                        var s = o.split(/\s+/);
                        n.each(s, function (n) {
                            var o = t[n];
                            if (!o)
                                throw new e.Error('Method "' + n + '" was configured as an event handler, but does not exist.');
                            t.listenTo(i, r, o);
                        });
                    }
                    function i(e, t, n, i) {
                        e.listenTo(t, n, i);
                    }
                    function r(e, t, i, r) {
                        var o = r.split(/\s+/);
                        n.each(o, function (n) {
                            var r = e[n];
                            e.stopListening(t, i, r);
                        });
                    }
                    function o(e, t, n, i) {
                        e.stopListening(t, n, i);
                    }
                    function s(t, i, r, o, s) {
                        if (i && r) {
                            if (!n.isObject(r))
                                throw new e.Error({
                                    message: 'Bindings must be an object or function.',
                                    url: 'marionette.functions.html#marionettebindentityevents'
                                });
                            r = e._getValue(r, t), n.each(r, function (e, r) {
                                n.isFunction(e) ? o(t, i, r, e) : s(t, i, r, e);
                            });
                        }
                    }
                    e.bindEntityEvents = function (e, n, r) {
                        s(e, n, r, i, t);
                    }, e.unbindEntityEvents = function (e, t, n) {
                        s(e, t, n, o, r);
                    }, e.proxyBindEntityEvents = function (t, n) {
                        return e.bindEntityEvents(this, t, n);
                    }, e.proxyUnbindEntityEvents = function (t, n) {
                        return e.unbindEntityEvents(this, t, n);
                    };
                }(o);
                var a = [
                    'description',
                    'fileName',
                    'lineNumber',
                    'name',
                    'message',
                    'number'
                ];
                return o.Error = o.extend.call(Error, {
                    urlRoot: 'http://marionettejs.com/docs/v' + o.VERSION + '/',
                    constructor: function (e, t) {
                        n.isObject(e) ? (t = e, e = t.message) : t || (t = {});
                        var i = Error.call(this, e);
                        n.extend(this, n.pick(i, a), n.pick(t, a)), this.captureStackTrace(), t.url && (this.url = this.urlRoot + t.url);
                    },
                    captureStackTrace: function () {
                        Error.captureStackTrace && Error.captureStackTrace(this, o.Error);
                    },
                    toString: function () {
                        return this.name + ': ' + this.message + (this.url ? ' See: ' + this.url : '');
                    }
                }), o.Error.extend = o.extend, o.Callbacks = function () {
                    this._deferred = o.Deferred(), this._callbacks = [];
                }, n.extend(o.Callbacks.prototype, {
                    add: function (e, t) {
                        var i = n.result(this._deferred, 'promise');
                        this._callbacks.push({
                            cb: e,
                            ctx: t
                        }), i.then(function (n) {
                            t && (n.context = t), e.call(n.context, n.options);
                        });
                    },
                    run: function (e, t) {
                        this._deferred.resolve({
                            options: e,
                            context: t
                        });
                    },
                    reset: function () {
                        var e = this._callbacks;
                        this._deferred = o.Deferred(), this._callbacks = [], n.each(e, function (e) {
                            this.add(e.cb, e.ctx);
                        }, this);
                    }
                }), o.Controller = function (e) {
                    this.options = e || {}, n.isFunction(this.initialize) && this.initialize(this.options);
                }, o.Controller.extend = o.extend, n.extend(o.Controller.prototype, t.Events, {
                    destroy: function () {
                        return o._triggerMethod(this, 'before:destroy', arguments), o._triggerMethod(this, 'destroy', arguments), this.stopListening(), this.off(), this;
                    },
                    triggerMethod: o.triggerMethod,
                    mergeOptions: o.mergeOptions,
                    getOption: o.proxyGetOption
                }), o.Object = function (e) {
                    this.options = n.extend({}, n.result(this, 'options'), e), this.initialize.apply(this, arguments);
                }, o.Object.extend = o.extend, n.extend(o.Object.prototype, t.Events, {
                    initialize: function () {
                    },
                    destroy: function (e) {
                        return e = e || {}, this.triggerMethod('before:destroy', e), this.triggerMethod('destroy', e), this.stopListening(), this;
                    },
                    triggerMethod: o.triggerMethod,
                    mergeOptions: o.mergeOptions,
                    getOption: o.proxyGetOption,
                    bindEntityEvents: o.proxyBindEntityEvents,
                    unbindEntityEvents: o.proxyUnbindEntityEvents
                }), o.Region = o.Object.extend({
                    constructor: function (e) {
                        if (this.options = e || {}, this.el = this.getOption('el'), this.el = this.el instanceof t.$ ? this.el[0] : this.el, !this.el)
                            throw new o.Error({
                                name: 'NoElError',
                                message: 'An "el" must be specified for a region.'
                            });
                        this.$el = this.getEl(this.el), o.Object.call(this, e);
                    },
                    show: function (e, t) {
                        if (this._ensureElement()) {
                            this._ensureViewIsIntact(e), o.MonitorDOMRefresh(e);
                            var i = t || {}, r = e !== this.currentView, s = !!i.preventDestroy, a = !!i.forceShow, l = !!this.currentView, u = r && !s, c = r || a;
                            if (l && this.triggerMethod('before:swapOut', this.currentView, this, t), this.currentView && r && delete this.currentView._parent, u ? this.empty() : l && c && this.currentView.off('destroy', this.empty, this), c) {
                                e.once('destroy', this.empty, this), e._parent = this, this._renderView(e), l && this.triggerMethod('before:swap', e, this, t), this.triggerMethod('before:show', e, this, t), o.triggerMethodOn(e, 'before:show', e, this, t), l && this.triggerMethod('swapOut', this.currentView, this, t);
                                var d = o.isNodeAttached(this.el), f = [], h = n.extend({
                                        triggerBeforeAttach: this.triggerBeforeAttach,
                                        triggerAttach: this.triggerAttach
                                    }, i);
                                return d && h.triggerBeforeAttach && (f = this._displayedViews(e), this._triggerAttach(f, 'before:')), this.attachHtml(e), this.currentView = e, d && h.triggerAttach && (f = this._displayedViews(e), this._triggerAttach(f)), l && this.triggerMethod('swap', e, this, t), this.triggerMethod('show', e, this, t), o.triggerMethodOn(e, 'show', e, this, t), this;
                            }
                            return this;
                        }
                    },
                    triggerBeforeAttach: !0,
                    triggerAttach: !0,
                    _triggerAttach: function (e, t) {
                        var i = (t || '') + 'attach';
                        n.each(e, function (e) {
                            o.triggerMethodOn(e, i, e, this);
                        }, this);
                    },
                    _displayedViews: function (e) {
                        return n.union([e], n.result(e, '_getNestedViews') || []);
                    },
                    _renderView: function (e) {
                        e.supportsRenderLifecycle || o.triggerMethodOn(e, 'before:render', e), e.render(), e.supportsRenderLifecycle || o.triggerMethodOn(e, 'render', e);
                    },
                    _ensureElement: function () {
                        if (n.isObject(this.el) || (this.$el = this.getEl(this.el), this.el = this.$el[0]), !this.$el || 0 === this.$el.length) {
                            if (this.getOption('allowMissingEl'))
                                return !1;
                            throw new o.Error('An "el" ' + this.$el.selector + ' must exist in DOM');
                        }
                        return !0;
                    },
                    _ensureViewIsIntact: function (e) {
                        if (!e)
                            throw new o.Error({
                                name: 'ViewNotValid',
                                message: 'The view passed is undefined and therefore invalid. You must pass a view instance to show.'
                            });
                        if (e.isDestroyed)
                            throw new o.Error({
                                name: 'ViewDestroyedError',
                                message: 'View (cid: "' + e.cid + '") has already been destroyed and cannot be used.'
                            });
                    },
                    getEl: function (e) {
                        return t.$(e, o._getValue(this.options.parentEl, this));
                    },
                    attachHtml: function (e) {
                        this.$el.contents().detach(), this.el.appendChild(e.el);
                    },
                    empty: function (e) {
                        var t = this.currentView, n = e || {}, i = !!n.preventDestroy;
                        return t ? (t.off('destroy', this.empty, this), this.triggerMethod('before:empty', t), i || this._destroyView(), this.triggerMethod('empty', t), delete this.currentView, i && this.$el.contents().detach(), this) : this;
                    },
                    _destroyView: function () {
                        var e = this.currentView;
                        e.isDestroyed || (e.supportsDestroyLifecycle || o.triggerMethodOn(e, 'before:destroy', e), e.destroy ? e.destroy() : (e.remove(), e.isDestroyed = !0), e.supportsDestroyLifecycle || o.triggerMethodOn(e, 'destroy', e));
                    },
                    attachView: function (e) {
                        return this.currentView && delete this.currentView._parent, e._parent = this, this.currentView = e, this;
                    },
                    hasView: function () {
                        return !!this.currentView;
                    },
                    reset: function () {
                        return this.empty(), this.$el && (this.el = this.$el.selector), delete this.$el, this;
                    }
                }, {
                    buildRegion: function (e, t) {
                        if (n.isString(e))
                            return this._buildRegionFromSelector(e, t);
                        if (e.selector || e.el || e.regionClass)
                            return this._buildRegionFromObject(e, t);
                        if (n.isFunction(e))
                            return this._buildRegionFromRegionClass(e);
                        throw new o.Error({
                            message: 'Improper region configuration type.',
                            url: 'marionette.region.html#region-configuration-types'
                        });
                    },
                    _buildRegionFromSelector: function (e, t) {
                        return new t({ el: e });
                    },
                    _buildRegionFromObject: function (e, t) {
                        var i = e.regionClass || t, r = n.omit(e, 'selector', 'regionClass');
                        return e.selector && !r.el && (r.el = e.selector), new i(r);
                    },
                    _buildRegionFromRegionClass: function (e) {
                        return new e();
                    }
                }), o.RegionManager = o.Controller.extend({
                    constructor: function (e) {
                        this._regions = {}, this.length = 0, o.Controller.call(this, e), this.addRegions(this.getOption('regions'));
                    },
                    addRegions: function (e, t) {
                        return e = o._getValue(e, this, arguments), n.reduce(e, function (e, i, r) {
                            return n.isString(i) && (i = { selector: i }), i.selector && (i = n.defaults({}, i, t)), e[r] = this.addRegion(r, i), e;
                        }, {}, this);
                    },
                    addRegion: function (e, t) {
                        var n;
                        return n = t instanceof o.Region ? t : o.Region.buildRegion(t, o.Region), this.triggerMethod('before:add:region', e, n), n._parent = this, this._store(e, n), this.triggerMethod('add:region', e, n), n;
                    },
                    get: function (e) {
                        return this._regions[e];
                    },
                    getRegions: function () {
                        return n.clone(this._regions);
                    },
                    removeRegion: function (e) {
                        var t = this._regions[e];
                        return this._remove(e, t), t;
                    },
                    removeRegions: function () {
                        var e = this.getRegions();
                        return n.each(this._regions, function (e, t) {
                            this._remove(t, e);
                        }, this), e;
                    },
                    emptyRegions: function () {
                        var e = this.getRegions();
                        return n.invoke(e, 'empty'), e;
                    },
                    destroy: function () {
                        return this.removeRegions(), o.Controller.prototype.destroy.apply(this, arguments);
                    },
                    _store: function (e, t) {
                        this._regions[e] || this.length++, this._regions[e] = t;
                    },
                    _remove: function (e, t) {
                        this.triggerMethod('before:remove:region', e, t), t.empty(), t.stopListening(), delete t._parent, delete this._regions[e], this.length--, this.triggerMethod('remove:region', e, t);
                    }
                }), o.actAsCollection(o.RegionManager.prototype, '_regions'), o.TemplateCache = function (e) {
                    this.templateId = e;
                }, n.extend(o.TemplateCache, {
                    templateCaches: {},
                    get: function (e, t) {
                        var n = this.templateCaches[e];
                        return n || (n = new o.TemplateCache(e), this.templateCaches[e] = n), n.load(t);
                    },
                    clear: function () {
                        var e, t = n.toArray(arguments), i = t.length;
                        if (i > 0)
                            for (e = 0; e < i; e++)
                                delete this.templateCaches[t[e]];
                        else
                            this.templateCaches = {};
                    }
                }), n.extend(o.TemplateCache.prototype, {
                    load: function (e) {
                        if (this.compiledTemplate)
                            return this.compiledTemplate;
                        var t = this.loadTemplate(this.templateId, e);
                        return this.compiledTemplate = this.compileTemplate(t, e), this.compiledTemplate;
                    },
                    loadTemplate: function (e, n) {
                        var i = t.$(e);
                        if (!i.length)
                            throw new o.Error({
                                name: 'NoTemplateError',
                                message: 'Could not find template: "' + e + '"'
                            });
                        return i.html();
                    },
                    compileTemplate: function (e, t) {
                        return n.template(e, t);
                    }
                }), o.Renderer = {
                    render: function (e, t) {
                        if (!e)
                            throw new o.Error({
                                name: 'TemplateNotFoundError',
                                message: 'Cannot render the template since its false, null or undefined.'
                            });
                        var i = n.isFunction(e) ? e : o.TemplateCache.get(e);
                        return i(t);
                    }
                }, o.View = t.View.extend({
                    isDestroyed: !1,
                    supportsRenderLifecycle: !0,
                    supportsDestroyLifecycle: !0,
                    constructor: function (e) {
                        this.render = n.bind(this.render, this), e = o._getValue(e, this), this.options = n.extend({}, n.result(this, 'options'), e), this._behaviors = o.Behaviors(this), t.View.call(this, this.options), o.MonitorDOMRefresh(this);
                    },
                    getTemplate: function () {
                        return this.getOption('template');
                    },
                    serializeModel: function (e) {
                        return e.toJSON.apply(e, n.rest(arguments));
                    },
                    mixinTemplateHelpers: function (e) {
                        e = e || {};
                        var t = this.getOption('templateHelpers');
                        return t = o._getValue(t, this), n.extend(e, t);
                    },
                    normalizeUIKeys: function (e) {
                        var t = n.result(this, '_uiBindings');
                        return o.normalizeUIKeys(e, t || n.result(this, 'ui'));
                    },
                    normalizeUIValues: function (e, t) {
                        var i = n.result(this, 'ui'), r = n.result(this, '_uiBindings');
                        return o.normalizeUIValues(e, r || i, t);
                    },
                    configureTriggers: function () {
                        if (this.triggers) {
                            var e = this.normalizeUIKeys(n.result(this, 'triggers'));
                            return n.reduce(e, function (e, t, n) {
                                return e[n] = this._buildViewTrigger(t), e;
                            }, {}, this);
                        }
                    },
                    delegateEvents: function (e) {
                        return this._delegateDOMEvents(e), this.bindEntityEvents(this.model, this.getOption('modelEvents')), this.bindEntityEvents(this.collection, this.getOption('collectionEvents')), n.each(this._behaviors, function (e) {
                            e.bindEntityEvents(this.model, e.getOption('modelEvents')), e.bindEntityEvents(this.collection, e.getOption('collectionEvents'));
                        }, this), this;
                    },
                    _delegateDOMEvents: function (e) {
                        var i = o._getValue(e || this.events, this);
                        i = this.normalizeUIKeys(i), n.isUndefined(e) && (this.events = i);
                        var r = {}, s = n.result(this, 'behaviorEvents') || {}, a = this.configureTriggers(), l = n.result(this, 'behaviorTriggers') || {};
                        n.extend(r, s, i, a, l), t.View.prototype.delegateEvents.call(this, r);
                    },
                    undelegateEvents: function () {
                        return t.View.prototype.undelegateEvents.apply(this, arguments), this.unbindEntityEvents(this.model, this.getOption('modelEvents')), this.unbindEntityEvents(this.collection, this.getOption('collectionEvents')), n.each(this._behaviors, function (e) {
                            e.unbindEntityEvents(this.model, e.getOption('modelEvents')), e.unbindEntityEvents(this.collection, e.getOption('collectionEvents'));
                        }, this), this;
                    },
                    _ensureViewIsIntact: function () {
                        if (this.isDestroyed)
                            throw new o.Error({
                                name: 'ViewDestroyedError',
                                message: 'View (cid: "' + this.cid + '") has already been destroyed and cannot be used.'
                            });
                    },
                    destroy: function () {
                        if (this.isDestroyed)
                            return this;
                        var e = n.toArray(arguments);
                        return this.triggerMethod.apply(this, ['before:destroy'].concat(e)), this.isDestroyed = !0, this.triggerMethod.apply(this, ['destroy'].concat(e)), this.unbindUIElements(), this.isRendered = !1, this.remove(), n.invoke(this._behaviors, 'destroy', e), this;
                    },
                    bindUIElements: function () {
                        this._bindUIElements(), n.invoke(this._behaviors, this._bindUIElements);
                    },
                    _bindUIElements: function () {
                        if (this.ui) {
                            this._uiBindings || (this._uiBindings = this.ui);
                            var e = n.result(this, '_uiBindings');
                            this.ui = {}, n.each(e, function (e, t) {
                                this.ui[t] = this.$(e);
                            }, this);
                        }
                    },
                    unbindUIElements: function () {
                        this._unbindUIElements(), n.invoke(this._behaviors, this._unbindUIElements);
                    },
                    _unbindUIElements: function () {
                        this.ui && this._uiBindings && (n.each(this.ui, function (e, t) {
                            delete this.ui[t];
                        }, this), this.ui = this._uiBindings, delete this._uiBindings);
                    },
                    _buildViewTrigger: function (e) {
                        var t = n.defaults({}, e, {
                                preventDefault: !0,
                                stopPropagation: !0
                            }), i = n.isObject(e) ? t.event : e;
                        return function (e) {
                            e && (e.preventDefault && t.preventDefault && e.preventDefault(), e.stopPropagation && t.stopPropagation && e.stopPropagation());
                            var n = {
                                view: this,
                                model: this.model,
                                collection: this.collection
                            };
                            this.triggerMethod(i, n);
                        };
                    },
                    setElement: function () {
                        var e = t.View.prototype.setElement.apply(this, arguments);
                        return n.invoke(this._behaviors, 'proxyViewProperties', this), e;
                    },
                    triggerMethod: function () {
                        var e = o._triggerMethod(this, arguments);
                        return this._triggerEventOnBehaviors(arguments), this._triggerEventOnParentLayout(arguments[0], n.rest(arguments)), e;
                    },
                    _triggerEventOnBehaviors: function (e) {
                        for (var t = o._triggerMethod, n = this._behaviors, i = 0, r = n && n.length; i < r; i++)
                            t(n[i], e);
                    },
                    _triggerEventOnParentLayout: function (e, t) {
                        var i = this._parentLayoutView();
                        if (i) {
                            var r = o.getOption(i, 'childViewEventPrefix'), s = r + ':' + e, a = [this].concat(t);
                            o._triggerMethod(i, s, a);
                            var l = o.getOption(i, 'childEvents');
                            l = o._getValue(l, i);
                            var u = i.normalizeMethods(l);
                            u && n.isFunction(u[e]) && u[e].apply(i, a);
                        }
                    },
                    _getImmediateChildren: function () {
                        return [];
                    },
                    _getNestedViews: function () {
                        var e = this._getImmediateChildren();
                        return e.length ? n.reduce(e, function (e, t) {
                            return t._getNestedViews ? e.concat(t._getNestedViews()) : e;
                        }, e) : e;
                    },
                    _parentLayoutView: function () {
                        for (var e = this._parent; e;) {
                            if (e instanceof o.LayoutView)
                                return e;
                            e = e._parent;
                        }
                    },
                    normalizeMethods: o.normalizeMethods,
                    mergeOptions: o.mergeOptions,
                    getOption: o.proxyGetOption,
                    bindEntityEvents: o.proxyBindEntityEvents,
                    unbindEntityEvents: o.proxyUnbindEntityEvents
                }), o.ItemView = o.View.extend({
                    constructor: function () {
                        o.View.apply(this, arguments);
                    },
                    serializeData: function () {
                        if (!this.model && !this.collection)
                            return {};
                        var e = [this.model || this.collection];
                        return arguments.length && e.push.apply(e, arguments), this.model ? this.serializeModel.apply(this, e) : { items: this.serializeCollection.apply(this, e) };
                    },
                    serializeCollection: function (e) {
                        return e.toJSON.apply(e, n.rest(arguments));
                    },
                    render: function () {
                        return this._ensureViewIsIntact(), this.triggerMethod('before:render', this), this._renderTemplate(), this.isRendered = !0, this.bindUIElements(), this.triggerMethod('render', this), this;
                    },
                    _renderTemplate: function () {
                        var e = this.getTemplate();
                        if (e !== !1) {
                            if (!e)
                                throw new o.Error({
                                    name: 'UndefinedTemplateError',
                                    message: 'Cannot render the template since it is null or undefined.'
                                });
                            var t = this.mixinTemplateHelpers(this.serializeData()), n = o.Renderer.render(e, t, this);
                            return this.attachElContent(n), this;
                        }
                    },
                    attachElContent: function (e) {
                        return this.$el.html(e), this;
                    }
                }), o.CollectionView = o.View.extend({
                    childViewEventPrefix: 'childview',
                    sort: !0,
                    constructor: function (e) {
                        this.once('render', this._initialEvents), this._initChildViewStorage(), o.View.apply(this, arguments), this.on({
                            'before:show': this._onBeforeShowCalled,
                            show: this._onShowCalled,
                            'before:attach': this._onBeforeAttachCalled,
                            attach: this._onAttachCalled
                        }), this.initRenderBuffer();
                    },
                    initRenderBuffer: function () {
                        this._bufferedChildren = [];
                    },
                    startBuffering: function () {
                        this.initRenderBuffer(), this.isBuffering = !0;
                    },
                    endBuffering: function () {
                        var e, t = this._isShown && o.isNodeAttached(this.el);
                        this.isBuffering = !1, this._isShown && this._triggerMethodMany(this._bufferedChildren, this, 'before:show'), t && this._triggerBeforeAttach && (e = this._getNestedViews(), this._triggerMethodMany(e, this, 'before:attach')), this.attachBuffer(this, this._createBuffer()), t && this._triggerAttach && (e = this._getNestedViews(), this._triggerMethodMany(e, this, 'attach')), this._isShown && this._triggerMethodMany(this._bufferedChildren, this, 'show'), this.initRenderBuffer();
                    },
                    _triggerMethodMany: function (e, t, i) {
                        var r = n.drop(arguments, 3);
                        n.each(e, function (e) {
                            o.triggerMethodOn.apply(e, [
                                e,
                                i,
                                e,
                                t
                            ].concat(r));
                        });
                    },
                    _initialEvents: function () {
                        this.collection && (this.listenTo(this.collection, 'add', this._onCollectionAdd), this.listenTo(this.collection, 'remove', this._onCollectionRemove), this.listenTo(this.collection, 'reset', this.render), this.getOption('sort') && this.listenTo(this.collection, 'sort', this._sortViews));
                    },
                    _onCollectionAdd: function (e, t, i) {
                        var r = void 0 !== i.at && (i.index || t.indexOf(e));
                        if ((this.getOption('filter') || r === !1) && (r = n.indexOf(this._filteredSortedModels(r), e)), this._shouldAddChild(e, r)) {
                            this.destroyEmptyView();
                            var o = this.getChildView(e);
                            this.addChild(e, o, r);
                        }
                    },
                    _onCollectionRemove: function (e) {
                        var t = this.children.findByModel(e);
                        this.removeChildView(t), this.checkEmpty();
                    },
                    _onBeforeShowCalled: function () {
                        this._triggerBeforeAttach = this._triggerAttach = !1, this.children.each(function (e) {
                            o.triggerMethodOn(e, 'before:show', e);
                        });
                    },
                    _onShowCalled: function () {
                        this.children.each(function (e) {
                            o.triggerMethodOn(e, 'show', e);
                        });
                    },
                    _onBeforeAttachCalled: function () {
                        this._triggerBeforeAttach = !0;
                    },
                    _onAttachCalled: function () {
                        this._triggerAttach = !0;
                    },
                    render: function () {
                        return this._ensureViewIsIntact(), this.triggerMethod('before:render', this), this._renderChildren(), this.isRendered = !0, this.triggerMethod('render', this), this;
                    },
                    reorder: function () {
                        var e = this.children, t = this._filteredSortedModels();
                        if (!t.length && this._showingEmptyView)
                            return this;
                        var i = n.some(t, function (t) {
                            return !e.findByModel(t);
                        });
                        if (i)
                            this.render();
                        else {
                            var r = n.map(t, function (t, n) {
                                    var i = e.findByModel(t);
                                    return i._index = n, i.el;
                                }), o = e.filter(function (e) {
                                    return !n.contains(r, e.el);
                                });
                            this.triggerMethod('before:reorder'), this._appendReorderedChildren(r), n.each(o, this.removeChildView, this), this.checkEmpty(), this.triggerMethod('reorder');
                        }
                    },
                    resortView: function () {
                        o.getOption(this, 'reorderOnSort') ? this.reorder() : this.render();
                    },
                    _sortViews: function () {
                        var e = this._filteredSortedModels(), t = n.find(e, function (e, t) {
                                var n = this.children.findByModel(e);
                                return !n || n._index !== t;
                            }, this);
                        t && this.resortView();
                    },
                    _emptyViewIndex: -1,
                    _appendReorderedChildren: function (e) {
                        this.$el.append(e);
                    },
                    _renderChildren: function () {
                        this.destroyEmptyView(), this.destroyChildren({ checkEmpty: !1 }), this.isEmpty(this.collection) ? this.showEmptyView() : (this.triggerMethod('before:render:collection', this), this.startBuffering(), this.showCollection(), this.endBuffering(), this.triggerMethod('render:collection', this), this.children.isEmpty() && this.getOption('filter') && this.showEmptyView());
                    },
                    showCollection: function () {
                        var e, t = this._filteredSortedModels();
                        n.each(t, function (t, n) {
                            e = this.getChildView(t), this.addChild(t, e, n);
                        }, this);
                    },
                    _filteredSortedModels: function (e) {
                        var t = this.getViewComparator(), i = this.collection.models;
                        if (e = Math.min(Math.max(e, 0), i.length - 1), t) {
                            var r;
                            e && (r = i[e], i = i.slice(0, e).concat(i.slice(e + 1))), i = this._sortModelsBy(i, t), r && i.splice(e, 0, r);
                        }
                        return this.getOption('filter') && (i = n.filter(i, function (e, t) {
                            return this._shouldAddChild(e, t);
                        }, this)), i;
                    },
                    _sortModelsBy: function (e, t) {
                        return 'string' == typeof t ? n.sortBy(e, function (e) {
                            return e.get(t);
                        }, this) : 1 === t.length ? n.sortBy(e, t, this) : e.sort(n.bind(t, this));
                    },
                    showEmptyView: function () {
                        var e = this.getEmptyView();
                        if (e && !this._showingEmptyView) {
                            this.triggerMethod('before:render:empty'), this._showingEmptyView = !0;
                            var n = new t.Model();
                            this.addEmptyView(n, e), this.triggerMethod('render:empty');
                        }
                    },
                    destroyEmptyView: function () {
                        this._showingEmptyView && (this.triggerMethod('before:remove:empty'), this.destroyChildren(), delete this._showingEmptyView, this.triggerMethod('remove:empty'));
                    },
                    getEmptyView: function () {
                        return this.getOption('emptyView');
                    },
                    addEmptyView: function (e, t) {
                        var i, r = this._isShown && !this.isBuffering && o.isNodeAttached(this.el), s = this.getOption('emptyViewOptions') || this.getOption('childViewOptions');
                        n.isFunction(s) && (s = s.call(this, e, this._emptyViewIndex));
                        var a = this.buildChildView(e, t, s);
                        a._parent = this, this.proxyChildEvents(a), a.once('render', function () {
                            this._isShown && o.triggerMethodOn(a, 'before:show', a), r && this._triggerBeforeAttach && (i = this._getViewAndNested(a), this._triggerMethodMany(i, this, 'before:attach'));
                        }, this), this.children.add(a), this.renderChildView(a, this._emptyViewIndex), r && this._triggerAttach && (i = this._getViewAndNested(a), this._triggerMethodMany(i, this, 'attach')), this._isShown && o.triggerMethodOn(a, 'show', a);
                    },
                    getChildView: function (e) {
                        var t = this.getOption('childView');
                        if (!t)
                            throw new o.Error({
                                name: 'NoChildViewError',
                                message: 'A "childView" must be specified'
                            });
                        return t;
                    },
                    addChild: function (e, t, n) {
                        var i = this.getOption('childViewOptions');
                        i = o._getValue(i, this, [
                            e,
                            n
                        ]);
                        var r = this.buildChildView(e, t, i);
                        return this._updateIndices(r, !0, n), this.triggerMethod('before:add:child', r), this._addChildView(r, n), this.triggerMethod('add:child', r), r._parent = this, r;
                    },
                    _updateIndices: function (e, t, n) {
                        this.getOption('sort') && (t && (e._index = n), this.children.each(function (n) {
                            n._index >= e._index && (n._index += t ? 1 : -1);
                        }));
                    },
                    _addChildView: function (e, t) {
                        var n, i = this._isShown && !this.isBuffering && o.isNodeAttached(this.el);
                        this.proxyChildEvents(e), e.once('render', function () {
                            this._isShown && !this.isBuffering && o.triggerMethodOn(e, 'before:show', e), i && this._triggerBeforeAttach && (n = this._getViewAndNested(e), this._triggerMethodMany(n, this, 'before:attach'));
                        }, this), this.children.add(e), this.renderChildView(e, t), i && this._triggerAttach && (n = this._getViewAndNested(e), this._triggerMethodMany(n, this, 'attach')), this._isShown && !this.isBuffering && o.triggerMethodOn(e, 'show', e);
                    },
                    renderChildView: function (e, t) {
                        return e.supportsRenderLifecycle || o.triggerMethodOn(e, 'before:render', e), e.render(), e.supportsRenderLifecycle || o.triggerMethodOn(e, 'render', e), this.attachHtml(this, e, t), e;
                    },
                    buildChildView: function (e, t, i) {
                        var r = n.extend({ model: e }, i), s = new t(r);
                        return o.MonitorDOMRefresh(s), s;
                    },
                    removeChildView: function (e) {
                        return e ? (this.triggerMethod('before:remove:child', e), e.supportsDestroyLifecycle || o.triggerMethodOn(e, 'before:destroy', e), e.destroy ? e.destroy() : e.remove(), e.supportsDestroyLifecycle || o.triggerMethodOn(e, 'destroy', e), delete e._parent, this.stopListening(e), this.children.remove(e), this.triggerMethod('remove:child', e), this._updateIndices(e, !1), e) : e;
                    },
                    isEmpty: function () {
                        return !this.collection || 0 === this.collection.length;
                    },
                    checkEmpty: function () {
                        this.isEmpty(this.collection) && this.showEmptyView();
                    },
                    attachBuffer: function (e, t) {
                        e.$el.append(t);
                    },
                    _createBuffer: function () {
                        var e = document.createDocumentFragment();
                        return n.each(this._bufferedChildren, function (t) {
                            e.appendChild(t.el);
                        }), e;
                    },
                    attachHtml: function (e, t, n) {
                        e.isBuffering ? e._bufferedChildren.splice(n, 0, t) : e._insertBefore(t, n) || e._insertAfter(t);
                    },
                    _insertBefore: function (e, t) {
                        var n, i = this.getOption('sort') && t < this.children.length - 1;
                        return i && (n = this.children.find(function (e) {
                            return e._index === t + 1;
                        })), !!n && (n.$el.before(e.el), !0);
                    },
                    _insertAfter: function (e) {
                        this.$el.append(e.el);
                    },
                    _initChildViewStorage: function () {
                        this.children = new t.ChildViewContainer();
                    },
                    destroy: function () {
                        return this.isDestroyed ? this : (this.triggerMethod('before:destroy:collection'), this.destroyChildren({ checkEmpty: !1 }), this.triggerMethod('destroy:collection'), o.View.prototype.destroy.apply(this, arguments));
                    },
                    destroyChildren: function (e) {
                        var t = e || {}, i = !0, r = this.children.map(n.identity);
                        return n.isUndefined(t.checkEmpty) || (i = t.checkEmpty), this.children.each(this.removeChildView, this), i && this.checkEmpty(), r;
                    },
                    _shouldAddChild: function (e, t) {
                        var i = this.getOption('filter');
                        return !n.isFunction(i) || i.call(this, e, t, this.collection);
                    },
                    proxyChildEvents: function (e) {
                        var t = this.getOption('childViewEventPrefix');
                        this.listenTo(e, 'all', function () {
                            var i = n.toArray(arguments), r = i[0], o = this.normalizeMethods(n.result(this, 'childEvents'));
                            i[0] = t + ':' + r, i.splice(1, 0, e), 'undefined' != typeof o && n.isFunction(o[r]) && o[r].apply(this, i.slice(1)), this.triggerMethod.apply(this, i);
                        });
                    },
                    _getImmediateChildren: function () {
                        return n.values(this.children._views);
                    },
                    _getViewAndNested: function (e) {
                        return [e].concat(n.result(e, '_getNestedViews') || []);
                    },
                    getViewComparator: function () {
                        return this.getOption('viewComparator');
                    }
                }), o.CompositeView = o.CollectionView.extend({
                    constructor: function () {
                        o.CollectionView.apply(this, arguments);
                    },
                    _initialEvents: function () {
                        this.collection && (this.listenTo(this.collection, 'add', this._onCollectionAdd), this.listenTo(this.collection, 'remove', this._onCollectionRemove), this.listenTo(this.collection, 'reset', this._renderChildren), this.getOption('sort') && this.listenTo(this.collection, 'sort', this._sortViews));
                    },
                    getChildView: function (e) {
                        var t = this.getOption('childView') || this.constructor;
                        return t;
                    },
                    serializeData: function () {
                        var e = {};
                        return this.model && (e = n.partial(this.serializeModel, this.model).apply(this, arguments)), e;
                    },
                    render: function () {
                        return this._ensureViewIsIntact(), this._isRendering = !0, this.resetChildViewContainer(), this.triggerMethod('before:render', this), this._renderTemplate(), this._renderChildren(), this._isRendering = !1, this.isRendered = !0, this.triggerMethod('render', this), this;
                    },
                    _renderChildren: function () {
                        (this.isRendered || this._isRendering) && o.CollectionView.prototype._renderChildren.call(this);
                    },
                    _renderTemplate: function () {
                        var e = {};
                        e = this.serializeData(), e = this.mixinTemplateHelpers(e), this.triggerMethod('before:render:template');
                        var t = this.getTemplate(), n = o.Renderer.render(t, e, this);
                        this.attachElContent(n), this.bindUIElements(), this.triggerMethod('render:template');
                    },
                    attachElContent: function (e) {
                        return this.$el.html(e), this;
                    },
                    attachBuffer: function (e, t) {
                        var n = this.getChildViewContainer(e);
                        n.append(t);
                    },
                    _insertAfter: function (e) {
                        var t = this.getChildViewContainer(this, e);
                        t.append(e.el);
                    },
                    _appendReorderedChildren: function (e) {
                        var t = this.getChildViewContainer(this);
                        t.append(e);
                    },
                    getChildViewContainer: function (e, t) {
                        if (e.$childViewContainer)
                            return e.$childViewContainer;
                        var n, i = o.getOption(e, 'childViewContainer');
                        if (i) {
                            var r = o._getValue(i, e);
                            if (n = '@' === r.charAt(0) && e.ui ? e.ui[r.substr(4)] : e.$(r), n.length <= 0)
                                throw new o.Error({
                                    name: 'ChildViewContainerMissingError',
                                    message: 'The specified "childViewContainer" was not found: ' + e.childViewContainer
                                });
                        } else
                            n = e.$el;
                        return e.$childViewContainer = n, n;
                    },
                    resetChildViewContainer: function () {
                        this.$childViewContainer && (this.$childViewContainer = void 0);
                    }
                }), o.LayoutView = o.ItemView.extend({
                    regionClass: o.Region,
                    options: { destroyImmediate: !1 },
                    childViewEventPrefix: 'childview',
                    constructor: function (e) {
                        e = e || {}, this._firstRender = !0, this._initializeRegions(e), o.ItemView.call(this, e);
                    },
                    render: function () {
                        return this._ensureViewIsIntact(), this._firstRender ? this._firstRender = !1 : this._reInitializeRegions(), o.ItemView.prototype.render.apply(this, arguments);
                    },
                    destroy: function () {
                        return this.isDestroyed ? this : (this.getOption('destroyImmediate') === !0 && this.$el.remove(), this.regionManager.destroy(), o.ItemView.prototype.destroy.apply(this, arguments));
                    },
                    showChildView: function (e, t, i) {
                        var r = this.getRegion(e);
                        return r.show.apply(r, n.rest(arguments));
                    },
                    getChildView: function (e) {
                        return this.getRegion(e).currentView;
                    },
                    addRegion: function (e, t) {
                        var n = {};
                        return n[e] = t, this._buildRegions(n)[e];
                    },
                    addRegions: function (e) {
                        return this.regions = n.extend({}, this.regions, e), this._buildRegions(e);
                    },
                    removeRegion: function (e) {
                        return delete this.regions[e], this.regionManager.removeRegion(e);
                    },
                    getRegion: function (e) {
                        return this.regionManager.get(e);
                    },
                    getRegions: function () {
                        return this.regionManager.getRegions();
                    },
                    _buildRegions: function (e) {
                        var t = {
                            regionClass: this.getOption('regionClass'),
                            parentEl: n.partial(n.result, this, 'el')
                        };
                        return this.regionManager.addRegions(e, t);
                    },
                    _initializeRegions: function (e) {
                        var t;
                        this._initRegionManager(), t = o._getValue(this.regions, this, [e]) || {};
                        var i = this.getOption.call(e, 'regions');
                        i = o._getValue(i, this, [e]), n.extend(t, i), t = this.normalizeUIValues(t, [
                            'selector',
                            'el'
                        ]), this.addRegions(t);
                    },
                    _reInitializeRegions: function () {
                        this.regionManager.invoke('reset');
                    },
                    getRegionManager: function () {
                        return new o.RegionManager();
                    },
                    _initRegionManager: function () {
                        this.regionManager = this.getRegionManager(), this.regionManager._parent = this, this.listenTo(this.regionManager, 'before:add:region', function (e) {
                            this.triggerMethod('before:add:region', e);
                        }), this.listenTo(this.regionManager, 'add:region', function (e, t) {
                            this[e] = t, this.triggerMethod('add:region', e, t);
                        }), this.listenTo(this.regionManager, 'before:remove:region', function (e) {
                            this.triggerMethod('before:remove:region', e);
                        }), this.listenTo(this.regionManager, 'remove:region', function (e, t) {
                            delete this[e], this.triggerMethod('remove:region', e, t);
                        });
                    },
                    _getImmediateChildren: function () {
                        return n.chain(this.regionManager.getRegions()).pluck('currentView').compact().value();
                    }
                }), o.Behavior = o.Object.extend({
                    constructor: function (e, t) {
                        this.view = t, this.defaults = n.result(this, 'defaults') || {}, this.options = n.extend({}, this.defaults, e), this.ui = n.extend({}, n.result(t, 'ui'), n.result(this, 'ui')), o.Object.apply(this, arguments);
                    },
                    $: function () {
                        return this.view.$.apply(this.view, arguments);
                    },
                    destroy: function () {
                        return this.stopListening(), this;
                    },
                    proxyViewProperties: function (e) {
                        this.$el = e.$el, this.el = e.el;
                    }
                }), o.Behaviors = function (e, t) {
                    function n(e, i) {
                        return t.isObject(e.behaviors) ? (i = n.parseBehaviors(e, i || t.result(e, 'behaviors')), n.wrap(e, i, t.keys(s)), i) : {};
                    }
                    function i(e, t) {
                        this._view = e, this._behaviors = t, this._triggers = {};
                    }
                    function r(e) {
                        return e._uiBindings || e.ui;
                    }
                    var o = /^(\S+)\s*(.*)$/, s = {
                            behaviorTriggers: function (e, t) {
                                var n = new i(this, t);
                                return n.buildBehaviorTriggers();
                            },
                            behaviorEvents: function (n, i) {
                                var s = {};
                                return t.each(i, function (n, i) {
                                    var a = {}, l = t.clone(t.result(n, 'events')) || {};
                                    l = e.normalizeUIKeys(l, r(n));
                                    var u = 0;
                                    t.each(l, function (e, r) {
                                        var s = r.match(o), l = s[1] + '.' + [
                                                this.cid,
                                                i,
                                                u++,
                                                ' '
                                            ].join(''), c = s[2], d = l + c, f = t.isFunction(e) ? e : n[e];
                                        f && (a[d] = t.bind(f, n));
                                    }, this), s = t.extend(s, a);
                                }, this), s;
                            }
                        };
                    return t.extend(n, {
                        behaviorsLookup: function () {
                            throw new e.Error({
                                message: 'You must define where your behaviors are stored.',
                                url: 'marionette.behaviors.html#behaviorslookup'
                            });
                        },
                        getBehaviorClass: function (t, i) {
                            return t.behaviorClass ? t.behaviorClass : e._getValue(n.behaviorsLookup, this, [
                                t,
                                i
                            ])[i];
                        },
                        parseBehaviors: function (e, i) {
                            return t.chain(i).map(function (i, r) {
                                var o = n.getBehaviorClass(i, r), s = new o(i, e), a = n.parseBehaviors(e, t.result(s, 'behaviors'));
                                return [s].concat(a);
                            }).flatten().value();
                        },
                        wrap: function (e, n, i) {
                            t.each(i, function (i) {
                                e[i] = t.partial(s[i], e[i], n);
                            });
                        }
                    }), t.extend(i.prototype, {
                        buildBehaviorTriggers: function () {
                            return t.each(this._behaviors, this._buildTriggerHandlersForBehavior, this), this._triggers;
                        },
                        _buildTriggerHandlersForBehavior: function (n, i) {
                            var o = t.clone(t.result(n, 'triggers')) || {};
                            o = e.normalizeUIKeys(o, r(n)), t.each(o, t.bind(this._setHandlerForBehavior, this, n, i));
                        },
                        _setHandlerForBehavior: function (e, t, n, i) {
                            var r = i.replace(/^\S+/, function (e) {
                                return e + '.' + 'behaviortriggers' + t;
                            });
                            this._triggers[r] = this._view._buildViewTrigger(n);
                        }
                    }), n;
                }(o, n), o.AppRouter = t.Router.extend({
                    constructor: function (e) {
                        this.options = e || {}, t.Router.apply(this, arguments);
                        var n = this.getOption('appRoutes'), i = this._getController();
                        this.processAppRoutes(i, n), this.on('route', this._processOnRoute, this);
                    },
                    appRoute: function (e, t) {
                        var n = this._getController();
                        this._addAppRoute(n, e, t);
                    },
                    _processOnRoute: function (e, t) {
                        if (n.isFunction(this.onRoute)) {
                            var i = n.invert(this.getOption('appRoutes'))[e];
                            this.onRoute(e, i, t);
                        }
                    },
                    processAppRoutes: function (e, t) {
                        if (t) {
                            var i = n.keys(t).reverse();
                            n.each(i, function (n) {
                                this._addAppRoute(e, n, t[n]);
                            }, this);
                        }
                    },
                    _getController: function () {
                        return this.getOption('controller');
                    },
                    _addAppRoute: function (e, t, i) {
                        var r = e[i];
                        if (!r)
                            throw new o.Error('Method "' + i + '" was not found on the controller');
                        this.route(t, i, n.bind(r, e));
                    },
                    mergeOptions: o.mergeOptions,
                    getOption: o.proxyGetOption,
                    triggerMethod: o.triggerMethod,
                    bindEntityEvents: o.proxyBindEntityEvents,
                    unbindEntityEvents: o.proxyUnbindEntityEvents
                }), o.Application = o.Object.extend({
                    constructor: function (e) {
                        this._initializeRegions(e), this._initCallbacks = new o.Callbacks(), this.submodules = {}, n.extend(this, e), this._initChannel(), o.Object.apply(this, arguments);
                    },
                    execute: function () {
                        this.commands.execute.apply(this.commands, arguments);
                    },
                    request: function () {
                        return this.reqres.request.apply(this.reqres, arguments);
                    },
                    addInitializer: function (e) {
                        this._initCallbacks.add(e);
                    },
                    start: function (e) {
                        this.triggerMethod('before:start', e), this._initCallbacks.run(e, this), this.triggerMethod('start', e);
                    },
                    addRegions: function (e) {
                        return this._regionManager.addRegions(e);
                    },
                    emptyRegions: function () {
                        return this._regionManager.emptyRegions();
                    },
                    removeRegion: function (e) {
                        return this._regionManager.removeRegion(e);
                    },
                    getRegion: function (e) {
                        return this._regionManager.get(e);
                    },
                    getRegions: function () {
                        return this._regionManager.getRegions();
                    },
                    module: function (e, t) {
                        var i = o.Module.getClass(t), r = n.toArray(arguments);
                        return r.unshift(this), i.create.apply(i, r);
                    },
                    getRegionManager: function () {
                        return new o.RegionManager();
                    },
                    _initializeRegions: function (e) {
                        var t = n.isFunction(this.regions) ? this.regions(e) : this.regions || {};
                        this._initRegionManager();
                        var i = o.getOption(e, 'regions');
                        return n.isFunction(i) && (i = i.call(this, e)), n.extend(t, i), this.addRegions(t), this;
                    },
                    _initRegionManager: function () {
                        this._regionManager = this.getRegionManager(), this._regionManager._parent = this, this.listenTo(this._regionManager, 'before:add:region', function () {
                            o._triggerMethod(this, 'before:add:region', arguments);
                        }), this.listenTo(this._regionManager, 'add:region', function (e, t) {
                            this[e] = t, o._triggerMethod(this, 'add:region', arguments);
                        }), this.listenTo(this._regionManager, 'before:remove:region', function () {
                            o._triggerMethod(this, 'before:remove:region', arguments);
                        }), this.listenTo(this._regionManager, 'remove:region', function (e) {
                            delete this[e], o._triggerMethod(this, 'remove:region', arguments);
                        });
                    },
                    _initChannel: function () {
                        this.channelName = n.result(this, 'channelName') || 'global', this.channel = n.result(this, 'channel') || t.Wreqr.radio.channel(this.channelName), this.vent = n.result(this, 'vent') || this.channel.vent, this.commands = n.result(this, 'commands') || this.channel.commands, this.reqres = n.result(this, 'reqres') || this.channel.reqres;
                    }
                }), o.Module = function (e, t, i) {
                    this.moduleName = e, this.options = n.extend({}, this.options, i), this.initialize = i.initialize || this.initialize, this.submodules = {}, this._setupInitializersAndFinalizers(), this.app = t, n.isFunction(this.initialize) && this.initialize(e, t, this.options);
                }, o.Module.extend = o.extend, n.extend(o.Module.prototype, t.Events, {
                    startWithParent: !0,
                    initialize: function () {
                    },
                    addInitializer: function (e) {
                        this._initializerCallbacks.add(e);
                    },
                    addFinalizer: function (e) {
                        this._finalizerCallbacks.add(e);
                    },
                    start: function (e) {
                        this._isInitialized || (n.each(this.submodules, function (t) {
                            t.startWithParent && t.start(e);
                        }), this.triggerMethod('before:start', e), this._initializerCallbacks.run(e, this), this._isInitialized = !0, this.triggerMethod('start', e));
                    },
                    stop: function () {
                        this._isInitialized && (this._isInitialized = !1, this.triggerMethod('before:stop'), n.invoke(this.submodules, 'stop'), this._finalizerCallbacks.run(void 0, this), this._initializerCallbacks.reset(), this._finalizerCallbacks.reset(), this.triggerMethod('stop'));
                    },
                    addDefinition: function (e, t) {
                        this._runModuleDefinition(e, t);
                    },
                    _runModuleDefinition: function (e, i) {
                        if (e) {
                            var r = n.flatten([
                                this,
                                this.app,
                                t,
                                o,
                                t.$,
                                n,
                                i
                            ]);
                            e.apply(this, r);
                        }
                    },
                    _setupInitializersAndFinalizers: function () {
                        this._initializerCallbacks = new o.Callbacks(), this._finalizerCallbacks = new o.Callbacks();
                    },
                    triggerMethod: o.triggerMethod
                }), n.extend(o.Module, {
                    create: function (e, t, i) {
                        var r = e, o = n.drop(arguments, 3);
                        t = t.split('.');
                        var s = t.length, a = [];
                        return a[s - 1] = i, n.each(t, function (t, n) {
                            var s = r;
                            r = this._getModule(s, t, e, i), this._addModuleDefinition(s, r, a[n], o);
                        }, this), r;
                    },
                    _getModule: function (e, t, i, r, o) {
                        var s = n.extend({}, r), a = this.getClass(r), l = e[t];
                        return l || (l = new a(t, i, s), e[t] = l, e.submodules[t] = l), l;
                    },
                    getClass: function (e) {
                        var t = o.Module;
                        return e ? e.prototype instanceof t ? e : e.moduleClass || t : t;
                    },
                    _addModuleDefinition: function (e, t, n, i) {
                        var r = this._getDefine(n), o = this._getStartWithParent(n, t);
                        r && t.addDefinition(r, i), this._addStartWithParent(e, t, o);
                    },
                    _getStartWithParent: function (e, t) {
                        var i;
                        return n.isFunction(e) && e.prototype instanceof o.Module ? (i = t.constructor.prototype.startWithParent, !!n.isUndefined(i) || i) : !n.isObject(e) || (i = e.startWithParent, !!n.isUndefined(i) || i);
                    },
                    _getDefine: function (e) {
                        return !n.isFunction(e) || e.prototype instanceof o.Module ? n.isObject(e) ? e.define : null : e;
                    },
                    _addStartWithParent: function (e, t, n) {
                        t.startWithParent = t.startWithParent && n, t.startWithParent && !t.startWithParentIsConfigured && (t.startWithParentIsConfigured = !0, e.addInitializer(function (e) {
                            t.startWithParent && t.start(e);
                        }));
                    }
                }), o;
            }), CKFinder.define('CKFinder/Views/Base/Common', [
                'underscore',
                'marionette'
            ], function (e, t) {
                'use strict';
                var n = {
                    proto: {
                        getTemplate: function () {
                            var e = t.getOption(this, 'template'), n = t.getOption(this, 'imports'), i = this.name;
                            return this.finder.templateCache.has(i) ? this.finder.templateCache.get(i) : this.finder.templateCache.compile(i, e, n);
                        },
                        mixinTemplateHelpers: function (n) {
                            n = n || {};
                            var i = this.getOption('templateHelpers');
                            return i = t._getValue(i, this), e.extend(n, {
                                lang: this.finder.lang,
                                config: this.finder.config
                            }, i);
                        }
                    },
                    util: {
                        construct: function (e) {
                            if (!this.name) {
                                if (!e.name)
                                    throw 'name parameter must be specified';
                                this.name = e.name;
                            }
                            if (!this.finder) {
                                if (!e.finder)
                                    throw 'Finder parameter must be specified for view: ' + this.name;
                                this.finder = e.finder;
                            }
                            this.finder.fire('view:' + this.name, { view: this }, this.finder);
                        }
                    }
                };
                return n;
            }), CKFinder.define('CKFinder/Views/Base/CompositeView', [
                'underscore',
                'marionette',
                'CKFinder/Views/Base/Common'
            ], function (e, t, n) {
                'use strict';
                var i = t.CompositeView, r = i.extend(n.proto), o = r.extend({
                        constructor: function (e) {
                            n.util.construct.call(this, e), i.prototype.constructor.apply(this, Array.prototype.slice.call(arguments));
                        },
                        buildChildView: function (t, n, i) {
                            var r = e.extend({
                                model: t,
                                finder: this.finder
                            }, i);
                            return new n(r);
                        },
                        attachBuffer: function (e, t) {
                            var n = this.getChildViewContainer(e);
                            n.append(t), this.triggerMethod('attachBuffer');
                        }
                    });
                return o;
            }), CKFinder.define('CKFinder/Views/Base/ItemView', [
                'marionette',
                'CKFinder/Views/Base/Common'
            ], function (e, t) {
                'use strict';
                var n = e.ItemView, i = n.extend(t.proto), r = i.extend({
                        constructor: function (e) {
                            t.util.construct.call(this, e), n.prototype.constructor.apply(this, Array.prototype.slice.call(arguments));
                        }
                    });
                return r;
            }), CKFinder.define('text', ['module'], function (e) {
                'use strict';
                function t(e, t) {
                    return void 0 === e || '' === e ? t : e;
                }
                function n(e, n, i, r) {
                    if (n === r)
                        return !0;
                    if (e === i) {
                        if (e === 'http')
                            return t(n, '80') === t(r, '80');
                        if (e === 'https')
                            return t(n, '443') === t(r, '443');
                    }
                    return !1;
                }
                var i, r, o, s, a, l = [
                        'Msxml2.XMLHTTP',
                        'Microsoft.XMLHTTP',
                        'Msxml2.XMLHTTP.4.0'
                    ], u = /^\s*<\?xml(\s)+version=[\'\"](\d)*.(\d)*[\'\"](\s)*\?>/im, c = /<body[^>]*>\s*([\s\S]+)\s*<\/body>/im, d = 'undefined' != typeof location && location.href, f = d && location.protocol && location.protocol.replace(/\:/, ''), h = d && location.hostname, g = d && (location.port || void 0), p = {}, v = e.config && e.config() || {};
                return i = {
                    version: '2.0.15',
                    strip: function (e) {
                        if (e) {
                            e = e.replace(u, '');
                            var t = e.match(c);
                            t && (e = t[1]);
                        } else
                            e = '';
                        return e;
                    },
                    jsEscape: function (e) {
                        return e.replace(/(['\\])/g, '\\$1').replace(/[\f]/g, '\\f').replace(/[\b]/g, '\\b').replace(/[\n]/g, '\\n').replace(/[\t]/g, '\\t').replace(/[\r]/g, '\\r').replace(/[\u2028]/g, '\\u2028').replace(/[\u2029]/g, '\\u2029');
                    },
                    createXhr: v.createXhr || function () {
                        var e, t, n;
                        if ('undefined' != typeof XMLHttpRequest)
                            return new XMLHttpRequest();
                        if ('undefined' != typeof ActiveXObject)
                            for (t = 0; t < 3; t += 1) {
                                n = l[t];
                                try {
                                    e = new ActiveXObject(n);
                                } catch (e) {
                                }
                                if (e) {
                                    l = [n];
                                    break;
                                }
                            }
                        return e;
                    },
                    parseName: function (e) {
                        var t, n, i, r = !1, o = e.lastIndexOf('.'), s = 0 === e.indexOf('./') || 0 === e.indexOf('../');
                        return o !== -1 && (!s || o > 1) ? (t = e.substring(0, o), n = e.substring(o + 1)) : t = e, i = n || t, o = i.indexOf('!'), o !== -1 && (r = i.substring(o + 1) === 'strip', i = i.substring(0, o), n ? n = i : t = i), {
                            moduleName: t,
                            ext: n,
                            strip: r
                        };
                    },
                    xdRegExp: /^((\w+)\:)?\/\/([^\/\\]+)/,
                    useXhr: function (e, t, r, o) {
                        var s, a, l, u = i.xdRegExp.exec(e);
                        return !u || (s = u[2], a = u[3], a = a.split(':'), l = a[1], a = a[0], (!s || s === t) && (!a || a.toLowerCase() === r.toLowerCase()) && (!l && !a || n(s, l, t, o)));
                    },
                    finishLoad: function (e, t, n, r) {
                        n = t ? i.strip(n) : n, v.isBuild && (p[e] = n), r(n);
                    },
                    load: function (e, t, n, r) {
                        if (r && r.isBuild && !r.inlineText)
                            return void n();
                        v.isBuild = r && r.isBuild;
                        var o = i.parseName(e), s = o.moduleName + (o.ext ? '.' + o.ext : ''), a = t.toUrl(s), l = v.useXhr || i.useXhr;
                        return 0 === a.indexOf('empty:') ? void n() : void (!d || l(a, f, h, g) ? i.get(a, function (t) {
                            i.finishLoad(e, o.strip, t, n);
                        }, function (e) {
                            n.error && n.error(e);
                        }) : t([s], function (e) {
                            i.finishLoad(o.moduleName + '.' + o.ext, o.strip, e, n);
                        }));
                    },
                    write: function (e, t, n, r) {
                        if (p.hasOwnProperty(t)) {
                            var o = i.jsEscape(p[t]);
                            n.asModule(e + '!' + t, 'define(function () { return \'' + o + '\';});\n');
                        }
                    },
                    writeFile: function (e, t, n, r, o) {
                        var s = i.parseName(t), a = s.ext ? '.' + s.ext : '', l = s.moduleName + a, u = n.toUrl(s.moduleName + a) + '.js';
                        i.load(l, n, function (t) {
                            var n = function (e) {
                                return r(u, e);
                            };
                            n.asModule = function (e, t) {
                                return r.asModule(e, u, t);
                            }, i.write(e, l, n, o);
                        }, o);
                    }
                }, v.env === 'node' || !v.env && 'undefined' != typeof process && process.versions && process.versions.node && !process.versions['node-webkit'] && !process.versions['atom-shell'] ? (r = require.nodeRequire('fs'), i.get = function (e, t, n) {
                    try {
                        var i = r.readFileSync(e, 'utf8');
                        '\uFEFF' === i[0] && (i = i.substring(1)), t(i);
                    } catch (e) {
                        n && n(e);
                    }
                }) : v.env === 'xhr' || !v.env && i.createXhr() ? i.get = function (e, t, n, r) {
                    var o, s = i.createXhr();
                    if (s.open('GET', e, !0), r)
                        for (o in r)
                            r.hasOwnProperty(o) && s.setRequestHeader(o.toLowerCase(), r[o]);
                    v.onXhr && v.onXhr(s, e), s.onreadystatechange = function (i) {
                        var r, o;
                        4 === s.readyState && (r = s.status || 0, r > 399 && r < 600 ? (o = new Error(e + ' HTTP status: ' + r), o.xhr = s, n && n(o)) : t(s.responseText), v.onXhrComplete && v.onXhrComplete(s, e));
                    }, s.send(null);
                } : v.env === 'rhino' || !v.env && 'undefined' != typeof Packages && 'undefined' != typeof java ? i.get = function (e, t) {
                    var n, i, r = 'utf-8', o = new java.io.File(e), s = java.lang.System.getProperty('line.separator'), a = new java.io.BufferedReader(new java.io.InputStreamReader(new java.io.FileInputStream(o), r)), l = '';
                    try {
                        for (n = new java.lang.StringBuffer(), i = a.readLine(), i && i.length() && 65279 === i.charAt(0) && (i = i.substring(1)), null !== i && n.append(i); null !== (i = a.readLine());)
                            n.append(s), n.append(i);
                        l = String(n.toString());
                    } finally {
                        a.close();
                    }
                    t(l);
                } : (v.env === 'xpconnect' || !v.env && 'undefined' != typeof Components && Components.classes && Components.interfaces) && (o = Components.classes, s = Components.interfaces, Components.utils['import']('resource://gre/modules/FileUtils.jsm'), a = '@mozilla.org/windows-registry-key;1' in o, i.get = function (e, t) {
                    var n, i, r, l = {};
                    a && (e = e.replace(/\//g, '\\')), r = new FileUtils.File(e);
                    try {
                        n = o['@mozilla.org/network/file-input-stream;1'].createInstance(s.nsIFileInputStream), n.init(r, 1, 0, !1), i = o['@mozilla.org/intl/converter-input-stream;1'].createInstance(s.nsIConverterInputStream), i.init(n, 'utf-8', n.available(), s.nsIConverterInputStream.DEFAULT_REPLACEMENT_CHARACTER), i.readString(n.available(), l), i.close(), n.close(), t(l.value);
                    } catch (e) {
                        throw new Error((r && r.path || '') + ': ' + e);
                    }
                }), i;
            }), CKFinder.define('text!CKFinder/Templates/ContextMenu/ContextMenuItem.dot', [], function () {
                return '{{? it.divider }}{{??}}\n\t<a tabindex="-1" class="ui-btn {{? !it.isActive }}ui-state-disabled {{?}}{{? it.icon }}ui-btn-icon-{{? it.lang.dir === \'ltr\' }}left{{??}}right{{?}} ui-icon-{{= it.icon }}{{?}}" {{? !it.isActive }}aria-disabled="true"{{?}} data-ckf-name="{{= it.name }}" {{? it.linkAttributes }}{{~ it.linkAttributes :attribute}}{{=attribute.name}}="{{=attribute.value}}"{{~}}{{?}}>\n\t\t{{= it.label }}\n\t</a>\n{{?}}\n';
            }), CKFinder.define('CKFinder/Modules/ContextMenu/Views/ContextMenuView', [
                'underscore',
                'jquery',
                'CKFinder/Views/Base/CompositeView',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/ContextMenu/ContextMenuItem.dot',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r, o) {
                'use strict';
                function s(e, t) {
                    var n = e.x, i = e.y, r = t.height(), o = t.width();
                    return {
                        x: parseInt(n + (window.innerWidth < n + o ? -1 : 1) * o / 2, 10),
                        y: parseInt(i + (window.innerHeight < i + r ? -1 : 1) * r / 2 + document.body.scrollTop, 10)
                    };
                }
                var a = n.extend({
                    name: 'ContextMenu',
                    template: '<ul></ul>',
                    childViewContainer: 'ul',
                    emptyView: i.extend({
                        name: 'ContextMenuEmpty',
                        template: '<div class="ckf-message"></div>'
                    }),
                    initialize: function (n) {
                        function i(t) {
                            var i = t.model.get('action'), r = t.evt;
                            e.isFunction(i) && (r.stopPropagation(), r.preventDefault(), i(n.forView)), setTimeout(function () {
                                a.destroy();
                            }, 10);
                        }
                        function r(e) {
                            !a || a.$el.find(e.target).length || a.isDestroyed || a.destroy();
                        }
                        var a = this, l = t(document), u = 'mousedown contextmenu', c = n.position, d = n.positionToEl;
                        if (!c && d) {
                            var f = d.get(0).getBoundingClientRect();
                            c = {
                                x: f.left + d.width() / 2,
                                y: f.top + d.height() / 2
                            };
                        }
                        a.$el.attr('data-theme', a.finder.config.swatch), a.on('destroy', function () {
                            l.off(u, r), a.$el.length && a.$el.remove();
                        }), a.on('render', function () {
                            a.$el.find('ul').listview(), t('.ui-popup-container').remove(), a.$el.popup().popup('open'), a.$el.find('.ui-btn:first').focus(), c && c.x && c.y && a.$el.popup('reposition', s(c, a.$el)), setTimeout(function () {
                                l.one(u, r);
                            }, 0);
                        }), a.on('childview:itemclicked', function (e, t) {
                            a.destroy(), i(t);
                        }), a.on('childview:itemkeydown', function (t, n) {
                            var r, s, l, u = n.evt;
                            u.keyCode === o.up && (u.stopPropagation(), u.preventDefault(), r = a.$el.find('a').not('.ui-state-disabled'), s = e.indexOf(r, t.$el.find('a').get(0)), l = s - 1, r[l >= 0 ? l : r.length - 1].focus()), u.keyCode === o.down && (u.stopPropagation(), u.preventDefault(), r = a.$el.find('a').not('.ui-state-disabled'), s = e.indexOf(r, t.$el.find('a').get(0)), l = s + 1, r[l <= r.length - 1 ? l : 0].focus()), u.keyCode !== o.enter && u.keyCode !== o.space || (a.destroy(), t.model.get('isActive') && i(n)), u.keyCode === o.escape && (u.stopPropagation(), u.preventDefault(), a.destroy());
                        });
                    },
                    getChildView: function (e) {
                        var t = {
                            contextmenu: function (e) {
                                e.preventDefault(), e.stopPropagation();
                            }
                        };
                        e.get('divider') || (t['click a'] = function (e) {
                            this.trigger('itemclicked', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        }, t['keydown a'] = function (e) {
                            this.trigger('itemkeydown', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        });
                        var n = {
                            name: 'ContextMenuItem',
                            finder: this.finder,
                            template: r,
                            events: t,
                            tagName: 'li',
                            modelEvents: { 'change:active': 'render' }
                        };
                        return e.get('divider') && (n.attributes = { 'data-role': 'list-divider' }), i.extend(n);
                    }
                });
                return a;
            }), CKFinder.define('CKFinder/Modules/ContextMenu/ContextMenu', [
                'underscore',
                'backbone',
                'CKFinder/Modules/ContextMenu/Views/ContextMenuView'
            ], function (e, t, n) {
                'use strict';
                function i(e) {
                    function t() {
                        n.lastView && n.lastView.destroy();
                    }
                    this.finder = e, e.setHandler('contextMenu', r, this);
                    var n = this;
                    e.on('ui:blur', t), e.on('ui:resize', t), e.on('shortcuts:list:general', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.showContextMenu,
                            shortcuts: '{shift}+{f10}'
                        });
                    }, null, null, 50);
                }
                function r(e) {
                    var i = this, r = i.finder, o = new t.Collection(), s = {
                            groups: o,
                            context: e.context
                        };
                    if (r.fire('contextMenu', s, r) && r.fire('contextMenu:' + e.name, s, r)) {
                        o.forEach(function (n) {
                            var i = new t.Collection();
                            r.fire('contextMenu:' + e.name + ':' + n.get('name'), {
                                items: i,
                                context: e.context
                            }, r), n.set('items', i);
                        });
                        var a = new t.Collection();
                        o.forEach(function (e) {
                            var t = e.get('items');
                            t.length && (a.length && a.add({ divider: !0 }), a.add(t.models));
                        }), i.lastView && i.lastView.destroy();
                        var l = !(!e.evt || !e.evt.clientX) && {
                                x: e.evt.clientX,
                                y: e.evt.clientY
                            }, u = e.positionToEl ? e.positionToEl : null;
                        r.request('focus:remember'), i.lastView = new n({
                            finder: r,
                            className: 'ckf-contextmenu',
                            collection: a,
                            position: l,
                            positionToEl: u,
                            forView: e.view
                        }), i.lastView.on('destroy', function () {
                            r.request('focus:restore');
                        }), i.lastView.render();
                    }
                }
                return i;
            }), CKFinder.define('CKFinder/Models/FoldersCollection', [
                'backbone',
                'CKFinder/Models/Folder'
            ], function (e, t) {
                'use strict';
                var n = e.Collection.extend({
                    model: t,
                    initialize: function () {
                        this.on('change:name', this.sort);
                    },
                    comparator: function (e, t) {
                        return e.get('name').localeCompare(t.get('name'));
                    }
                });
                return n;
            }), CKFinder.define('CKFinder/Models/Folder', [
                'backbone',
                'CKFinder/Models/FoldersCollection'
            ], function (e, t) {
                'use strict';
                var n = e.Model.extend({
                    defaults: {
                        name: '',
                        hasChildren: !1,
                        resourceType: '',
                        isRoot: !1,
                        parent: null,
                        isPending: !1,
                        'view:isFolder': !0
                    },
                    initialize: function () {
                        function e() {
                            o.set('hasChildren', !!o.get('children').length);
                        }
                        this.set('name', this.get('name').toString(), { silent: !0 }), this.set('children', new t(), { silent: !0 });
                        var n = this.get('children');
                        n.on('change', e), n.on('remove', e), this.on('change:children', function (t, n) {
                            n && (n.on('change', e), n.on('remove', e));
                        });
                        var i = this.get('allowedExtensions');
                        i && 'string' == typeof i && this.set('allowedExtensions', i.split(','), { silent: !0 });
                        var r = this.get('allowedExtensions');
                        r && 'string' == typeof r && this.set('allowedExtensions', i.split(','), { silent: !0 });
                        var o = this;
                    },
                    getPath: function (e) {
                        var t, n;
                        return t = this.get('parent'), n = t ? t.getPath(e).toString() + this.get('name') + '/' : '/', this.get('isRoot') && e && e.full && (n = this.get('resourceType') + ':' + n), n;
                    },
                    getHash: function () {
                        if (this.has('hash'))
                            return this.get('hash');
                        var e = this.get('parent');
                        return e.getHash();
                    },
                    getUrl: function () {
                        if (this.has('url'))
                            return this.get('url');
                        var e = this.get('parent');
                        if (!e)
                            return !1;
                        var t = e.getUrl();
                        return t && t + encodeURIComponent(this.get('name')) + '/';
                    },
                    isPath: function (e, t) {
                        return e === this.getPath() && t === this.get('resourceType');
                    },
                    getResourceType: function () {
                        for (var e = this; !e.get('isRoot');)
                            e = e.get('parent');
                        return e;
                    }
                }, {
                    isValidName: function (e) {
                        var t = /[\\\/:\*\?"<>\|]/;
                        return !t.test(e);
                    }
                });
                return n;
            }), CKFinder.define('text!CKFinder/Templates/Folders/FolderNameDialogTemplate.dot', [], function () {
                return '<form action="#">\n\t<label>\n\t\t{{! it.dialogMessage }}\n\t\t<input name="newFolderName" value="{{! it.folderName }}" tabindex="1" aria-required="true" dir="auto">\n\t</label>\n</form>\n<p class="error-message"></p>\n';
            }), CKFinder.define('CKFinder/Modules/Folders/Views/FolderNameDialogView', [
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Models/Folder',
                'text!CKFinder/Templates/Folders/FolderNameDialogTemplate.dot'
            ], function (e, t, n) {
                'use strict';
                return e.extend({
                    name: 'FolderNameDialogView',
                    template: n,
                    ui: {
                        error: '.error-message',
                        folderName: 'input[name="newFolderName"]'
                    },
                    events: {
                        'input @ui.folderName': function () {
                            var e = this.ui.folderName.val().toString().trim();
                            t.isValidName(e) ? this.model.unset('error') : this.model.set('error', this.finder.lang.errors.folderInvalidCharacters), this.model.set('folderName', e);
                        },
                        submit: function (e) {
                            this.trigger('submit:form'), e.preventDefault();
                        }
                    },
                    modelEvents: {
                        'change:error': function (e, t) {
                            t ? (this.ui.error.show(), this.ui.error.html(t)) : this.ui.error.hide();
                        }
                    }
                });
            }), CKFinder.define('CKFinder/Modules/CreateFolder/CreateFolder', [
                'backbone',
                'CKFinder/Modules/Folders/Views/FolderNameDialogView'
            ], function (e, t) {
                'use strict';
                function n(n) {
                    n.setHandler('folder:create', function (i) {
                        var r = i.parent, o = i.newFolderName;
                        if (o)
                            n.request('loader:show', { text: n.lang.common.pleaseWait }), n.request('command:send', {
                                name: 'CreateFolder',
                                type: 'post',
                                folder: r,
                                params: { newFolderName: o },
                                context: { folder: r }
                            });
                        else {
                            var s = new e.Model({
                                    dialogMessage: n.lang.folders.newNameLabel,
                                    folderName: i.newFolderName,
                                    error: !1
                                }), a = n.request('dialog', {
                                    view: new t({
                                        finder: n,
                                        model: s
                                    }),
                                    name: 'CreateFolder',
                                    title: n.lang.common.newNameDialogTitle,
                                    context: { parent: r }
                                });
                            s.on('change:error', function (e, t) {
                                t ? a.disableButton('ok') : a.enableButton('ok');
                            });
                        }
                    }), n.on('dialog:CreateFolder:ok', function (e) {
                        var t = e.data.view.model;
                        if (!t.get('error')) {
                            var i = t.get('folderName');
                            e.finder.request('dialog:destroy'), n.request('folder:create', {
                                parent: e.data.context.parent,
                                newFolderName: i
                            });
                        }
                    }), n.on('contextMenu:folder:edit', function (e) {
                        var t = e.finder, n = e.data.context.folder;
                        e.data.items.add({
                            name: 'CreateFolder',
                            label: t.lang.folders.newSubfolder,
                            isActive: n.get('acl').folderCreate,
                            icon: 'ckf-folder-add',
                            action: function () {
                                t.request('folder:create', { parent: n });
                            }
                        });
                    }), n.on('toolbar:reset:Main:folder', function (e) {
                        var t = e.data.folder;
                        t.get('acl').folderCreate && e.data.toolbar.push({
                            type: 'button',
                            name: 'CreateFolder',
                            priority: 70,
                            icon: 'ckf-folder-add',
                            label: e.finder.lang.folders.newSubfolder,
                            action: function () {
                                n.request('folder:create', { parent: t });
                            }
                        });
                    }), n.on('command:after:CreateFolder', i);
                }
                function i(e) {
                    function t(e) {
                        e.data.context.parent.cid === n.cid && (e.data.response.error || n.trigger('ui:expand'), e.finder.removeListener('command:after:GetFolders', t));
                    }
                    var n = e.data.context.folder;
                    e.finder.request('loader:hide'), e.data.response.error || (n.set('hasChildren', !0), e.finder.once('command:after:GetFolders', t), e.finder.request('command:send', {
                        name: 'GetFolders',
                        folder: n,
                        context: { parent: n }
                    }, null, null, 30));
                }
                return n;
            }), CKFinder.define('text!CKFinder/Templates/DeleteFile/DeleteFileError.dot', [], function () {
                return '{{? it.msg }}<p>{{= it.msg }}</p>{{?}}\n<ul>\n{{~ it.errors :error }}<li>{{= error }}</li>{{~}}\n</ul>\n';
            }), CKFinder.define('CKFinder/Modules/DeleteFile/DeleteFile', [
                'underscore',
                'backbone',
                'text!CKFinder/Templates/DeleteFile/DeleteFileError.dot',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i) {
                'use strict';
                function r(e) {
                    this.finder = e, e.setHandler('files:delete', o, this), e.on('dialog:DeleteFileConfirm:ok', l), e.on('command:after:DeleteFiles', u), e.on('command:error:DeleteFiles', c), e.on('contextMenu:file', function (e) {
                        e.data.groups.add({ name: 'delete' });
                    }, null, null, 40), e.on('contextMenu:file:delete', a, this), e.on('toolbar:reset:Main:file', s), e.on('toolbar:reset:Main:files', s), d(e);
                }
                function o(e) {
                    var t, n = this.finder, i = e.files;
                    return i[0].get('folder').get('acl').fileDelete ? (t = i.length > 1 ? n.lang.files.deleteConfirmation.replace('{count}', i.length) : n.lang.files.fileDeleteConfirmation.replace('{name}', function () {
                        return n.util.escapeHtml(i[0].get('name'));
                    }), void n.request('dialog:confirm', {
                        name: 'DeleteFileConfirm',
                        msg: t,
                        context: { files: i }
                    })) : void n.request('dialog:info', { msg: n.lang.errors.deleteFilePermissions });
                }
                function s(e) {
                    var t = e.finder.request('folder:getActive');
                    t.get('acl').fileDelete && e.data.toolbar.push({
                        type: 'button',
                        name: 'DeleteFiles',
                        priority: 10,
                        icon: 'ckf-file-delete',
                        label: e.finder.lang.common.delete,
                        action: function () {
                            e.finder.request('files:delete', { files: e.finder.request('files:getSelected').toArray() });
                        }
                    });
                }
                function a(e) {
                    var t = this, n = t.finder, i = n.request('files:getSelected'), r = i.length > 1;
                    e.data.items.add({
                        name: 'DeleteFiles',
                        label: n.lang.common.delete,
                        isActive: e.data.context.file.get('folder').get('acl').fileDelete,
                        icon: 'ckf-file-delete',
                        action: function () {
                            n.request('files:delete', { files: r ? i : [e.data.context.file] });
                        }
                    });
                }
                function l(n) {
                    var i = n.data.context.files, r = [], o = n.finder;
                    i instanceof t.Collection && (i = i.toArray()), e.forEach(i, function (e) {
                        var t = e.get('folder');
                        r.push({
                            name: e.get('name'),
                            type: t.get('resourceType'),
                            folder: t.getPath()
                        });
                    });
                    var s = o.request('folder:getActive');
                    o.request('loader:show', { text: o.lang.common.pleaseWait }), o.request('command:send', {
                        name: 'DeleteFiles',
                        type: 'post',
                        post: { files: r },
                        sendPostAsJson: !0,
                        folder: s,
                        context: { files: i }
                    });
                }
                function u(t) {
                    var n = t.data.response;
                    t.finder.request('loader:hide'), n.error || (e.forEach(t.data.context.files, function (e) {
                        var t = e.get('folder');
                        t.get('children').remove(e);
                    }), t.finder.fire('files:deleted', { files: t.data.context.files }, t.finder));
                }
                function c(i) {
                    var r = i.data.response;
                    if (r.error.number === f) {
                        i.cancel();
                        var o = !!r.deleted, s = i.finder.lang.errors.codes[f], a = [];
                        e.forEach(r.error.errors, function (e) {
                            a.push(e.name + ': ' + i.finder.lang.errors.codes[e.number]), 117 === e.number && (o = !0);
                        }), i.finder.request('dialog', {
                            name: 'DeleteFilesErrors',
                            title: i.finder.lang.errors.operationCompleted,
                            template: n,
                            templateModel: new t.Model({
                                deleted: r.deleted,
                                errors: a,
                                msg: s
                            }),
                            buttons: ['okClose']
                        }), o && i.finder.request('folder:refreshFiles');
                    }
                }
                function d(e) {
                    e.on('file:keydown', function (t) {
                        if (t.data.evt.keyCode === i.delete && e.util.isShortcut(t.data.evt, '')) {
                            var n = e.request('files:getSelected'), r = n.length > 1 ? n.toArray() : [t.data.file];
                            e.request('files:delete', { files: r });
                        }
                    }), e.on('shortcuts:list:files', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.delete,
                            shortcuts: '{del}'
                        });
                    }, null, null, 30);
                }
                var f = 302;
                return r;
            }), CKFinder.define('CKFinder/Modules/DeleteFolder/DeleteFolder', ['CKFinder/Util/KeyCode'], function (e) {
                'use strict';
                function t(e) {
                    e.on('dialog:DeleteFolderConfirm:ok', function (t) {
                        var n = t.data.context.folder;
                        e.request('loader:show', { text: e.lang.common.pleaseWait }), e.request('command:send', {
                            name: 'DeleteFolder',
                            type: 'post',
                            folder: n,
                            context: { folder: n }
                        }, e);
                    }), e.on('command:after:DeleteFolder', function (t) {
                        var n = t.data.response, i = t.data.context.folder;
                        if (e.request('loader:hide'), !n.error) {
                            var r = i.get('parent');
                            i.unset('parent'), r.get('children').remove(i);
                            var o = e.request('folder:getActive');
                            o.cid === i.cid && e.request('folder:select', { folder: r }), e.fire('folder:deleted', { folder: i });
                        }
                    }), e.on('toolbar:reset:Main:folder', function (t) {
                        var n = t.data.folder;
                        !n.get('isRoot') && n.get('acl').folderDelete && t.data.toolbar.push({
                            type: 'button',
                            name: 'DeleteFolder',
                            priority: 20,
                            icon: 'ckf-folder-delete',
                            label: t.finder.lang.common.delete,
                            action: function () {
                                e.request('folder:delete', { folder: n });
                            }
                        });
                    }), e.on('contextMenu:folder', function (e) {
                        e.data.groups.add({ name: 'delete' });
                    }, null, null, 20), e.on('contextMenu:folder:delete', function (e) {
                        var t = e.finder, n = e.data.context.folder, i = n.get('isRoot'), r = n.get('acl');
                        e.data.items.add({
                            name: 'DeleteFolder',
                            label: t.lang.common.delete,
                            isActive: !i && r.folderDelete,
                            icon: 'ckf-folder-delete',
                            action: function () {
                                t.request('folder:delete', { folder: n });
                            }
                        });
                    }), e.setHandler('folder:delete', function (t) {
                        var n = t.folder;
                        e.request('dialog:confirm', {
                            name: 'DeleteFolderConfirm',
                            context: { folder: n },
                            msg: e.lang.folders.deleteConfirmation.replace('{name}', function () {
                                return e.util.escapeHtml(n.get('name'));
                            })
                        });
                    }), n(e);
                }
                function n(t) {
                    t.on('folder:keydown', function (n) {
                        n.data.folder.get('isRoot') || n.data.evt.keyCode === e.delete && n.finder.util.isShortcut(n.data.evt, '') && (n.data.evt.preventDefault(), n.data.evt.stopPropagation(), t.request('folder:delete', { folder: n.data.folder }));
                    }), t.on('shortcuts:list:folders', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.folders.delete,
                            shortcuts: '{del}'
                        });
                    }, null, null, 30);
                }
                return t;
            }), CKFinder.define('CKFinder/Views/Base/LayoutView', [
                'marionette',
                'CKFinder/Views/Base/Common'
            ], function (e, t) {
                'use strict';
                var n = e.LayoutView, i = n.extend(t.proto), r = i.extend({
                        constructor: function (n) {
                            t.util.construct.call(this, n), e.LayoutView.prototype.constructor.apply(this, Array.prototype.slice.call(arguments));
                        }
                    });
                return r;
            }), CKFinder.define('CKFinder/Views/Base/CollectionView', [
                'underscore',
                'marionette',
                'CKFinder/Views/Base/Common'
            ], function (e, t, n) {
                'use strict';
                var i = t.CollectionView, r = i.extend(n.proto), o = r.extend({
                        constructor: function (e) {
                            n.util.construct.call(this, e), i.prototype.constructor.apply(this, Array.prototype.slice.call(arguments));
                        },
                        buildChildView: function (t, n, i) {
                            var r = e.extend({
                                model: t,
                                finder: this.finder
                            }, i);
                            return new n(r);
                        }
                    });
                return o;
            }), CKFinder.define('CKFinder/Modules/Dialogs/Views/DialogButtonView', [
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/ItemView'
            ], function (e, t) {
                'use strict';
                return t.extend({
                    name: 'DialogButton',
                    tagName: 'button',
                    template: '{{= it.label }}',
                    attributes: { tabindex: 1 },
                    events: {
                        click: function () {
                            this.trigger('button');
                        },
                        keydown: function (t) {
                            t.keyCode !== e.enter && t.keyCode !== e.space || (t.preventDefault(), this.trigger('button'));
                        }
                    },
                    onRender: function () {
                        this.$el.attr('data-inline', !0).attr('data-ckf-button', this.model.get('name'));
                    }
                });
            }), CKFinder.define('CKFinder/Modules/Dialogs/Views/DialogButtonsView', [
                'underscore',
                'backbone',
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Modules/Dialogs/Views/DialogButtonView'
            ], function (e, t, n, i) {
                'use strict';
                function r(n, i) {
                    var r = new t.Collection();
                    return e.forEach(n, function (t) {
                        var n = e.isString(t) ? t : t.name;
                        r.push(e.extend({
                            icons: {},
                            label: n,
                            name: n,
                            event: n.toLocaleLowerCase()
                        }, e.isString(t) ? i[n] : t));
                    }), r;
                }
                return n.extend({
                    name: 'DialogButtons',
                    childView: i,
                    initialize: function (e) {
                        this.collection = r(e.buttons, {
                            ok: {
                                label: this.finder.lang.common.ok,
                                icons: { primary: 'ui-icon-check' }
                            },
                            okClose: {
                                label: this.finder.lang.common.ok,
                                icons: { primary: 'ui-icon-check' },
                                event: 'ok'
                            },
                            cancel: {
                                label: this.finder.lang.common.cancel,
                                icons: { primary: 'ui-icon-close' }
                            }
                        });
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/Dialogs/DialogLayout.dot', [], function () {
                return '{{? it.title }}<div data-role="header" class="ui-title"><h1>{{= it.title }}</h1></div>{{?}}\n<div id="ckf-dialog-contents-{{= it.id }}" class="ckf-dialog-contents {{= it.contentClassName }}"></div>\n{{? it.hasButtons }}<div class="ui-content ckf-dialog-buttons" id="ckf-dialog-buttons-{{= it.id }}"></div>{{?}}\n';
            }), CKFinder.define('CKFinder/Modules/Dialogs/Views/DialogView', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/LayoutView',
                'CKFinder/Modules/Dialogs/Views/DialogButtonsView',
                'text!CKFinder/Templates/Dialogs/DialogLayout.dot'
            ], function (e, t, n, i, r, o) {
                'use strict';
                var s = 20, a = i.extend({
                        template: o,
                        className: 'ckf-dialog',
                        ui: { title: '.ui-title:first' },
                        attributes: { role: 'dialog' },
                        regions: function (e) {
                            return {
                                contents: '#ckf-dialog-contents-' + e.id,
                                buttons: '#ckf-dialog-buttons-' + e.id
                            };
                        },
                        initialize: function () {
                            this.listenTo(this.contents, 'show', function () {
                                this.$el.trigger('create');
                            }, this), t('.ui-popup-container').remove();
                        },
                        onRender: function () {
                            var t = e.uniqueId(), i = 'ckf-dialog-label-' + t;
                            this.$el.attr('data-theme', this.finder.config.swatch).attr('aria-labelledby', i).attr('aria-describedby', this.regions.contents.replace('#', '')).appendTo('body'), this.options.ariaLabelId && this.$el.attr('aria-labelledby', this.$el.attr('aria-labelledby') + ' ' + this.regions.contents.replace('#', '')), this.ui.title.attr({
                                id: i,
                                'aria-live': 'polite'
                            }), this.contents.show(this.getOption('innerView')), this._addButtons(), this.$el.trigger('create'), this.$el.popup(this._getUiConfig()), this.$el.parent().addClass('ui-dialog-popup');
                            try {
                                this.$el.popup('open', this.options.uiOpen || {});
                            } catch (e) {
                            }
                            this.$el.find('.ckf-dialog-buttons button[data-ckf-button="okClose"],.ckf-dialog-buttons button[data-ckf-button="ok"]').first().focus();
                            var r = this.getOption('focusItem');
                            if (r) {
                                var o = e.isString(r) ? r : 'input, textarea, select', s = this.$el.find(o).first();
                                s.length && s.focus();
                            }
                            return this.options.restrictHeight && this.restrictHeight(), this.$el.on('keydown', function (e) {
                                e.keyCode !== n.tab && e.stopPropagation();
                            }), this;
                        },
                        onDestroy: function () {
                            try {
                                this.$el.popup('close'), this.$el.off('keydown'), this.$el.remove();
                            } catch (e) {
                            }
                        },
                        getButton: function (e) {
                            return this.$el.popup('widget').find('button[data-ckf-button="' + e + '"]');
                        },
                        enableButton: function (e) {
                            this.getButton(e).removeClass('ui-state-disabled').attr('aria-disabled', 'false');
                        },
                        disableButton: function (e) {
                            this.getButton(e).addClass('ui-state-disabled').attr('aria-disabled', 'true');
                        },
                        restrictHeight: function () {
                            if (!this.isDestroyed) {
                                var e = t(window).height() - this.ui.title.outerHeight() - this.buttons.$el.outerHeight() - this.$el.parent().position().top - s;
                                this.contents.$el.css('max-height', parseInt(e, 10) + 'px');
                            }
                        },
                        _fixTopOffset: function () {
                            var e = this.$el.parent().css('top'), t = parseInt(e) - (window.scrollY || window.pageYOffset);
                            this.$el.parent().css('top', t);
                        },
                        _addButtons: function () {
                            var e = this.getOption('buttons');
                            if (e) {
                                var t = this, n = new r({
                                        finder: this.finder,
                                        buttons: e
                                    });
                                this.listenTo(n, 'childview:button', function (e) {
                                    var n = e.model.get('event'), i = e.model.get('name');
                                    i !== 'cancel' && i !== 'okClose' || t.destroy(), t.finder.fire('dialog:' + t.getOption('dialog') + ':' + n, t.getOption('clickData'), t.finder);
                                }), this.buttons.show(n);
                            }
                        },
                        _getUiConfig: function () {
                            function t(e, t, n) {
                                i[e] && i[e].apply(t, n);
                            }
                            var n = this, i = {}, r = this.getOption('uiOptions');
                            r && e.forEach([
                                'create',
                                'afterclose',
                                'beforeposition'
                            ], function (e) {
                                i[e] = r[e], delete r[e];
                            });
                            var o = {
                                    create: function () {
                                        n.contents.$el.css({
                                            minWidth: n.getOption('minWidth'),
                                            minHeight: n.getOption('minHeight'),
                                            maxHeight: window.innerHeight
                                        }), t('create', this, arguments);
                                    },
                                    afterclose: function () {
                                        n.destroy(), n.finder.fire('dialog:close:' + n.getOption('dialog'), {
                                            context: n.context,
                                            me: n
                                        }), t('afterclose', this, arguments);
                                    },
                                    afteropen: function () {
                                        n._fixTopOffset(), t('afteropen', this, arguments);
                                    },
                                    beforeposition: function (e, i) {
                                        r && r.positionTo && (delete i.x, delete i.y, i.positionTo = r.positionTo), setTimeout(function () {
                                            n.options.restrictHeight && n.restrictHeight();
                                        }, 0), t('beforeposition', this, arguments);
                                    }
                                }, s = n.finder.config.dialogOverlaySwatch;
                            return s && (o.overlayTheme = e.isBoolean(s) ? n.finder.config.swatch : s), e.extend(o, r);
                        }
                    });
                return a;
            }), CKFinder.define('CKFinder/Views/MessageView', [
                'underscore',
                'backbone',
                'CKFinder/Views/Base/ItemView'
            ], function (e, t, n) {
                'use strict';
                var i = n.extend({
                    name: 'MessageView',
                    className: 'ckf-message',
                    template: '<span id="{{= it.id }}">{{= it.msg }}</span>',
                    initialize: function (n) {
                        this.model = new t.Model({
                            msg: n.msg,
                            id: n.id ? n.id : e.uniqueId()
                        });
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/Dialogs/Dialogs', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Dialogs/Views/DialogView',
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Views/MessageView'
            ], function (e, t, n, i, r, o, s) {
                'use strict';
                function a(e) {
                    this.finder = e, e.setHandlers({
                        dialog: {
                            callback: l,
                            context: this
                        },
                        'dialog:info': {
                            callback: u,
                            context: this
                        },
                        'dialog:confirm': {
                            callback: c,
                            context: this
                        },
                        'dialog:destroy': h
                    }), e.request('key:listen', { key: i.escape }), e.on('keyup:27', function (e) {
                        var n, i;
                        i = t('.ckf-dialog'), i.length && (n = e.data.evt, n.preventDefault(), n.stopPropagation(), h());
                    }, null, null, 20);
                }
                function l(t) {
                    var n = this.finder;
                    if (h(), !t.name)
                        throw 'Name parameter must be specified for dialog';
                    var i = !!e.isUndefined(t.captureFormSubmit) || t.captureFormSubmit, o = d(t, n, i), s = f(n, t, o), a = new r(s);
                    return n.request('focus:remember'), a.on('destroy', function () {
                        n.request('focus:restore');
                    }), i && a.listenTo(o, 'submit:form', function () {
                        return n.fire('dialog:' + t.name + ':ok', s.clickData, n), !1;
                    }), a.render(), n.request('focus:trap', { node: a.$el }), a;
                }
                function u(t) {
                    var n = e.uniqueId('ckf-message-'), i = e.extend({
                            name: 'Info',
                            buttons: ['okClose'],
                            view: new s({
                                msg: t.msg,
                                finder: this.finder,
                                id: n
                            }),
                            transition: 'flip',
                            ariaLabelId: n
                        }, t);
                    return l.call(this, i);
                }
                function c(t) {
                    var n = e.uniqueId('ckf-message-'), i = e.extend({
                            name: 'Confirm',
                            buttons: [
                                'okClose',
                                'cancel'
                            ],
                            title: this.finder.lang.common.messageTitle,
                            view: new s({
                                msg: t.msg,
                                finder: this.finder,
                                id: n
                            }),
                            ariaLabelId: n
                        }, t);
                    return l.call(this, i);
                }
                function d(e, t, n) {
                    var i;
                    if (e.view)
                        i = e.view;
                    else {
                        var r = {
                            name: e.name,
                            finder: t,
                            template: e.template
                        };
                        n && (r.triggers = {
                            'submit form': {
                                event: 'submit:form',
                                preventDefault: !0,
                                stopPropagation: !1
                            }
                        }), i = new (o.extend(r))({ model: e.templateModel });
                    }
                    return i;
                }
                function f(t, i, r) {
                    var o = {
                        context: i.context,
                        finder: t,
                        name: 'Dialog',
                        dialog: i.name,
                        id: e.uniqueId('ckf'),
                        minWidth: i.minWidth ? i.minWidth : t.config.dialogMinWidth,
                        minHeight: i.minHeight ? i.minHeight : t.config.dialogMinHeight,
                        focusItem: e.isUndefined(i.focusItem) ? t.config.dialogFocusItem : i.focusItem,
                        buttons: e.isUndefined(i.buttons) ? [
                            'ok',
                            'cancel'
                        ] : i.buttons,
                        captureFormSubmit: !!e.isUndefined(i.captureFormSubmit) || i.captureFormSubmit,
                        restrictHeight: !e.isUndefined(i.restrictHeight) && i.restrictHeight,
                        uiOptions: i.uiOptions
                    };
                    return i.ariaLabelId && (o.ariaLabelId = i.ariaLabelId), o.model = new n.Model({
                        id: o.id,
                        title: i.title,
                        hasButtons: !e.isUndefined(o.buttons),
                        contentClassName: e.isUndefined(i.contentClassName) ? ' ui-content' : i.contentClassName === !1 ? '' : ' ' + i.contentClassName
                    }), o.clickData = {
                        model: i.templateModel,
                        view: r,
                        context: i.context
                    }, o.innerView = r, o;
                }
                function h() {
                    t('.ckf-dialog').popup('close'), t('.ui-popup-container').remove();
                }
                return a;
            }), CKFinder.define('text!CKFinder/Templates/EditImage/EditImageLayout.dot', [], function () {
                return '<div class="ckf-ei-wrapper">\n\t<div id="ckf-ei-preview" class="ckf-ei-preview"></div>\n\t<div id="ckf-ei-actions" class="ckf-ei-controls ui-body-{{= it.swatch }}"></div>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/EditImageLayout', [
                'CKFinder/Views/Base/LayoutView',
                'text!CKFinder/Templates/EditImage/EditImageLayout.dot'
            ], function (e, t) {
                'use strict';
                return e.extend({
                    name: 'EditImageLayout',
                    template: t,
                    regions: {
                        preview: '#ckf-ei-preview',
                        actions: '#ckf-ei-actions'
                    },
                    templateHelpers: function () {
                        return { swatch: this.finder.config.swatch };
                    },
                    onActionsExpand: function () {
                        this.preview.$el.addClass('ckf-ei-preview-reduced');
                    },
                    onActionsCollapse: function () {
                        this.preview.$el.removeClass('ckf-ei-preview-reduced');
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/ImagePreview.dot', [], function () {
                return '<canvas class="ckf-ei-canvas"></canvas>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/ImagePreviewView', [
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/ImagePreview.dot'
            ], function (e, t) {
                'use strict';
                return e.extend({
                    name: 'ImagePreview',
                    template: t,
                    ui: { canvas: '.ckf-ei-canvas' }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/Action.dot', [], function () {
                return '<div data-role="collapsible" data-collapsed-icon="{{= it.icon}}" data-expanded-icon="{{= it.icon}}" data-iconpos="right" data-inset="false" tabindex="-1">\n    <h4 id="{{= it.id }}-tab" class="ckf-ei-action-title" role="tab" aria-controls="{{= it.id }}-tabpanel">{{= it.title }}</h4>\n    <div class="ckf-ei-action-controls"></div>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/ActionView', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/LayoutView',
                'text!CKFinder/Templates/EditImage/Action.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                return i.extend({
                    name: 'ActionView',
                    template: r,
                    className: 'ckf-ei-action',
                    ui: {
                        heading: '.ckf-ei-action-title',
                        controls: '.ckf-ei-action-controls'
                    },
                    regions: { action: '.ckf-ei-action-controls' },
                    events: {
                        collapsiblecollapse: function () {
                            this.model.get('tool').trigger('collapse'), this.ui.heading.attr('aria-expanded', 'false').find('.ui-btn').removeClass('ui-btn-active'), this.trigger('collapse'), this.isExpanded = !1, this.ui.controls.find('[tabindex]').attr('tabindex', '-1');
                        },
                        collapsibleexpand: function () {
                            this.model.get('tool').trigger('expand'), this.ui.heading.attr('aria-expanded', 'true').find('.ui-btn').addClass('ui-btn-active'), this.trigger('expand'), this.isExpanded = !0, this.ui.controls.find('[tabindex]').attr('tabindex', this.model.get('tabindex'));
                        },
                        collapsiblecreate: function () {
                            this.$el.find('.ui-collapsible-heading-toggle').attr('tabindex', this.model.get('tabindex')), this.ui.heading.attr('aria-expanded', 'false'), this.isExpanded = !1;
                            var e = this.model.get('id');
                            this.$el.find('.ui-collapsible-content').attr({
                                id: e + '-tabpanel',
                                role: 'tabpanel',
                                'aria-labelledby': e + '-tab'
                            });
                        },
                        'keydown .ui-collapsible-heading-toggle': function (e) {
                            if (e.keyCode === n.space || e.keyCode === n.enter) {
                                e.stopPropagation(), e.preventDefault();
                                var t = this.$el.find('.ui-collapsible').collapsible('option', 'collapsed') ? 'expand' : 'collapse';
                                this.$el.find('.ui-collapsible').collapsible(t);
                            }
                        },
                        'keydown [tabindex]': function (e) {
                            e.keyCode === n.tab && (!this.isExpanded && e.target === this.ui.heading.find('.ui-collapsible-heading-toggle').get(0) || this.ui.controls.find('[tabindex]').last().get(0) === e.target) && this.trigger('tabRequest', e);
                        }
                    },
                    initialize: function () {
                        this.model.set('id', e.uniqueId());
                    },
                    collapse: function () {
                        this.$el.find('.ui-collapsible').collapsible('collapse');
                    },
                    onRender: function () {
                        this.action.show(this.model.get('tool').getView(this.finder)), this.$el.attr('data-ckf-ei-tool', this.model.get('tool').get('name'));
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/ActionsView', [
                'jquery',
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Modules/EditImage/Views/ActionView'
            ], function (e, t, n) {
                'use strict';
                function i(t, n) {
                    var i = t === 'desktop';
                    e('.ckf-ei-controls .ui-collapsible-heading-toggle').toggleClass('ui-corner-all ui-btn-icon-notext', !i).toggleClass(n.lang.dir === 'ltr' ? 'ui-btn-icon-left' : 'right', i);
                }
                function r(e) {
                    e.data.modeChanged && i(e.data.mode, e.finder);
                }
                return t.extend({
                    name: 'ActionsView',
                    attributes: {
                        'data-role': 'collapsibleset',
                        role: 'tablist'
                    },
                    childView: n,
                    childViewContainer: '#ckf-edit-image-actions',
                    childEvents: {
                        expand: function (e) {
                            this.children.forEach(function (t) {
                                t.cid === e.cid || t.ui.heading.hasClass('ui-collapsible-heading-collapsed') || t.collapse();
                            });
                        },
                        tabRequest: function (e, t) {
                            this.finder.util.isShortcut(t, '') && this.children.last() !== e && this.finder.request('focus:next', {
                                node: e.$el.find('[tabindex]').not('[tabindex="-1"]').last(),
                                event: t
                            });
                        }
                    },
                    initialize: function () {
                        var t = this.finder;
                        this.collection.on('imageData:ready', function () {
                            i(t.request('ui:getMode'), t), e.mobile.resetActivePageHeight();
                        }), t.on('ui:resize', r);
                    },
                    onDestroy: function () {
                        this.finder.removeListener('ui:resize', r);
                    },
                    focusFirst: function () {
                        this.$el.find('.ui-collapsible-heading-toggle').first().focus();
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Models/EditImageData', ['backbone'], function (e) {
                'use strict';
                var t = e.Model.extend({
                    defaults: {
                        file: null,
                        caman: null,
                        imagePreview: '',
                        fullImagePreview: '',
                        actions: null
                    },
                    initialize: function () {
                        this.set('actions', new e.Collection());
                    }
                });
                return t;
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools/Tool', ['backbone'], function (e) {
                'use strict';
                return e.Model.extend({
                    getActionData: function () {
                        return new e.Model({});
                    },
                    saveDeferred: function (e, t) {
                        return t;
                    },
                    getView: function (e) {
                        var t = this.get('viewClass'), n = new t({
                                finder: e,
                                model: this.getActionData()
                            });
                        return this.set('view', n), n;
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/Crop.dot', [], function () {
                return '<div class="ckf-ei-crop-controls-inputs">\n\t<label>\n\t\t{{= it.lang.editImage.keepAspectRatio }}\n\t\t<input name="ckfCropKeepAspectRatio" tabindex="{{= it.tabindex }}" type="checkbox"{{? it.keepAspectRatio }} checked="checked"{{?}} data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}">\n\t</label>\n\t<button id="ckf-ei-crop-apply" tabindex="{{= it.tabindex }}" data-icon="ckf-tick" data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}">{{= it.lang.editImage.apply }}</button>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/CropView', [
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/Crop.dot'
            ], function (e, t, n) {
                'use strict';
                return t.extend({
                    name: 'CropView',
                    template: n,
                    className: 'ckf-ei-crop-controls',
                    ui: {
                        keepAspectRatio: 'input[name="ckfCropKeepAspectRatio"]',
                        apply: '#ckf-ei-crop-apply'
                    },
                    triggers: { 'click @ui.apply': 'apply' },
                    events: {
                        'change @ui.keepAspectRatio': function (e) {
                            e.stopPropagation(), e.preventDefault(), this.model.set('keepAspectRatio', this.ui.keepAspectRatio.is(':checked'));
                        },
                        'keyup @ui.keepAspectRatio': function (t) {
                            t.keyCode !== e.space && t.keyCode !== e.enter || (t.preventDefault(), t.stopPropagation(), this.ui.keepAspectRatio.prop('checked', !this.ui.keepAspectRatio.is(':checked')).checkboxradio('refresh').trigger('change'));
                        },
                        'keydown @ui.apply': function (t) {
                            t.keyCode !== e.space && t.keyCode !== e.enter || this.trigger('apply');
                        }
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/CropBox.dot', [], function () {
                return '<div class="ckf-ei-crop">\n\t<div class="ckf-ei-crop-resize" tabindex="{{= it.tabindex + 1 }}"></div>\n\t<div class="ckf-ei-crop-info"></div>\n</div>';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/CropBoxView', [
                'jquery',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/CropBox.dot'
            ], function (e, t, n) {
                'use strict';
                var i = t.extend({
                    name: 'CropBoxView',
                    className: 'ckf-ei-crop-wrap',
                    template: n,
                    ui: {
                        cropBox: '.ckf-ei-crop',
                        cropResize: '.ckf-ei-crop-resize',
                        cropInfo: '.ckf-ei-crop-info'
                    },
                    events: {
                        'vmousedown @ui.cropBox': 'onMouseDown',
                        'vmouseup @ui.cropBox': 'onMouseUp',
                        'vmousedown @ui.cropResize': 'onMouseDownOnResize',
                        'vmouseup @ui.cropResize': 'onMouseUpOnResize'
                    },
                    modelEvents: {
                        change: 'updatePosition',
                        'change:keepAspectRatio': function () {
                            if (this.model.get('keepAspectRatio')) {
                                var e = this.model.get('renderHeight'), t = this.model.get('maxRenderHeight'), n = this.model.get('maxRenderWidth'), i = t - this.model.get('renderY'), r = n - this.model.get('renderX');
                                e > i && (e = i);
                                var o = parseInt(e * n / t, 10);
                                o > r && (o = r, e = parseInt(o * t / n, 10)), this.model.set({
                                    renderWidth: o,
                                    renderHeight: e
                                });
                            }
                        }
                    },
                    onRender: function () {
                        var e;
                        e = this.model.get('canvas'), this.$el.css({
                            width: this.model.get('maxRenderWidth'),
                            height: this.model.get('maxRenderHeight')
                        }), this.ui.cropBox.css({
                            backgroundImage: 'url(' + e.toDataURL() + ')',
                            backgroundSize: this.model.get('maxRenderWidth') + 'px ' + this.model.get('maxRenderHeight') + 'px'
                        }), this.updatePosition();
                    },
                    onMouseDown: function (t) {
                        var n = this;
                        t.stopPropagation(), e(window).on('vmousemove', {
                            model: n.model,
                            view: n,
                            moveStart: {
                                x: t.clientX - n.model.get('renderX'),
                                y: t.clientY - n.model.get('renderY')
                            }
                        }, n.mouseMove), e(window).one('vmouseup', function () {
                            n.onMouseUp();
                        });
                    },
                    onMouseUp: function (t) {
                        t && t.stopPropagation(), e(window).off('vmousemove', this.mouseMove);
                    },
                    mouseMove: function (e) {
                        var t, n, i, r, o, s, a, l;
                        t = e.data.model, n = e.data.view.ui.cropBox, i = e.clientX - e.data.moveStart.x, r = e.clientY - e.data.moveStart.y, o = n.outerWidth(), s = n.outerHeight(), a = t.get('maxRenderWidth') - o, l = t.get('maxRenderHeight') - s, i = i < 0 ? 0 : i, r = r < 0 ? 0 : r, i = i > a ? a : i, r = r > l ? l : r, t.set({
                            renderX: i,
                            renderY: r
                        });
                    },
                    onMouseDownOnResize: function (t) {
                        var n = this;
                        t.stopPropagation(), e(window).on('vmousemove', {
                            model: n.model,
                            view: n,
                            moveStart: {
                                x: t.clientX - n.model.get('renderWidth'),
                                y: t.clientY - n.model.get('renderHeight')
                            }
                        }, n.mouseResize), e(window).one('vmouseup', function () {
                            n.onMouseUpOnResize();
                        });
                    },
                    onMouseUpOnResize: function () {
                        e(window).off('vmousemove', this.mouseResize);
                    },
                    mouseResize: function (e) {
                        var t, n, i, r, o, s;
                        t = e.data.model, n = t.get('minCrop'), i = e.clientX - e.data.moveStart.x, r = e.clientY - e.data.moveStart.y, o = t.get('maxRenderWidth') - t.get('renderX'), s = t.get('maxRenderHeight') - t.get('renderY'), r = r < n ? n : r, i = i < n ? n : i, t.get('keepAspectRatio') && (i = parseInt(r * t.get('maxRenderWidth') / t.get('maxRenderHeight'), 10)), i = i > o ? o : i, r = r > s ? s : r, t.set({
                            renderWidth: i,
                            renderHeight: r
                        });
                    },
                    updatePosition: function () {
                        var e = this.model.get('renderX'), t = this.model.get('renderY'), n = (this.ui.cropBox.outerWidth() - this.ui.cropBox.width()) / 2;
                        this.ui.cropBox.css({
                            top: t + 'px',
                            left: e + 'px',
                            width: this.model.get('renderWidth') - 2 * n + 'px',
                            height: this.model.get('renderHeight') - 2 * n + 'px',
                            backgroundPosition: -e - n + 'px ' + (-t - n) + 'px'
                        }), this.ui.cropInfo.text(this.model.get('width') + 'x' + this.model.get('height')), this.ui.cropInfo.attr('data-ckf-position', this.model.get('x') + ',' + this.model.get('y'));
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools/CropTool', [
                'backbone',
                'jquery',
                'CKFinder/Modules/EditImage/Tools/Tool',
                'CKFinder/Modules/EditImage/Views/CropView',
                'CKFinder/Modules/EditImage/Views/CropBoxView'
            ], function (e, t, n, i, r) {
                'use strict';
                return n.extend({
                    defaults: {
                        name: 'Crop',
                        viewClass: i,
                        view: null,
                        isVisible: !1
                    },
                    initialize: function () {
                        function n(e) {
                            var t, n, i;
                            i = e.get('renderWidth'), n = e.get('renderHeight'), t = e.get('imageWidth') / e.get('maxRenderWidth'), e.set('width', parseInt(i * t, 10)), e.set('height', parseInt(n * t, 10)), e.set('x', parseInt(e.get('renderX') * t, 10)), e.set('y', parseInt(e.get('renderY') * t, 10));
                        }
                        function i() {
                            r.get('isVisible') && (r.closeCropBox(), r.openCropBox());
                        }
                        this.viewModel = new e.Model({
                            x: 0,
                            y: 0,
                            width: 0,
                            height: 0,
                            renderWidth: 0,
                            renderHeight: 0,
                            maxWidth: 0,
                            maxHeight: 0,
                            imageWidth: 0,
                            imageHeight: 0,
                            keepAspectRatio: !1,
                            tabindex: this.get('tabindex')
                        }), this.viewModel.on('change:renderWidth', n), this.viewModel.on('change:renderHeight', n), this.viewModel.on('change:renderX', n), this.viewModel.on('change:renderY', n), this.collection.on('imageData:ready', function () {
                            var e, n, i, r, o, s;
                            e = this.get('editImageData'), s = e.get('caman').renderingCanvas, n = t(s).width(), i = t(s).height(), r = parseInt(n / 2, 10), o = parseInt(i / 2, 10), this.viewModel.set({
                                canvas: e.get('caman').renderingCanvas,
                                minCrop: 10,
                                x: e.get('imageWidth'),
                                y: e.get('imageHeight'),
                                renderX: parseInt((n - r) / 2, 10),
                                renderY: parseInt((i - o) / 2, 10),
                                width: e.get('imageWidth'),
                                height: e.get('imageHeight'),
                                renderWidth: r,
                                renderHeight: o,
                                maxRenderWidth: n,
                                maxRenderHeight: i,
                                imageWidth: e.get('imageInfo').width,
                                imageHeight: e.get('imageInfo').height
                            }), this.get('view').on('apply', function () {
                                this.cropView();
                            }, this);
                        }, this), this.on('expand', this.openCropBox, this), this.on('collapse', this.closeCropBox, this);
                        var r = this;
                        this.collection.on('tool:reset:after', i), this.collection.on('ui:resize', i);
                    },
                    cropView: function () {
                        var e = this.get('editImageData'), t = e.get('caman').renderingCanvas, n = t.width / this.viewModel.get('maxRenderWidth');
                        e.get('caman').crop(parseInt(n * this.viewModel.get('renderWidth'), 10), parseInt(n * this.viewModel.get('renderHeight'), 10), parseInt(n * this.viewModel.get('renderX'), 10), parseInt(n * this.viewModel.get('renderY'), 10)), this.collection.requestThrottler();
                        var i = !1;
                        e.get('actions').forEach(function (e) {
                            e.get('tool') === 'Rotate' && (i = !i);
                        }), n = (i ? e.get('imageHeight') : e.get('imageWidth')) / this.viewModel.get('maxRenderWidth'), e.get('actions').push({
                            tool: this.get('name'),
                            data: {
                                width: parseInt(n * this.viewModel.get('renderWidth'), 10),
                                height: parseInt(n * this.viewModel.get('renderHeight'), 10),
                                x: parseInt(n * this.viewModel.get('renderX'), 10),
                                y: parseInt(n * this.viewModel.get('renderY'), 10)
                            }
                        }), this.closeCropBox();
                    },
                    openCropBox: function () {
                        var e = this.get('editImageData').get('caman').renderingCanvas, n = t(e).width(), i = t(e).height(), o = parseInt(n / 2, 10), s = parseInt(i / 2, 10);
                        this.viewModel.set({
                            maxRenderWidth: n,
                            maxRenderHeight: i,
                            renderWidth: o,
                            renderHeight: s,
                            renderX: parseInt((n - o) / 2, 10),
                            renderY: parseInt((i - s) / 2, 10)
                        }), this.cropBox = new r({
                            finder: this.collection.finder,
                            model: this.viewModel
                        }), this.cropBox.render().$el.appendTo(t(this.get('editImageData').get('caman').renderingCanvas).parent()), this.set('isVisible', !0);
                    },
                    closeCropBox: function () {
                        this.cropBox && this.cropBox.destroy(), this.set('isVisible', !1);
                    },
                    saveDeferred: function (e, n) {
                        var i, r;
                        return i = new t.Deferred(), r = i.promise(), n.then(function (t) {
                            t.crop(e.width, e.height, e.x, e.y).render(function () {
                                i.resolve(this);
                            });
                        }), r;
                    },
                    getActionData: function () {
                        return this.viewModel;
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/Rotate.dot', [], function () {
                return '<div class="ckf-ei-rotate-controls-inputs">\n\t<button id="ckf-ei-rotate-anticlockwise" tabindex="{{= it.tabindex }}" data-icon="ckf-rotate-left" data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}">{{= it.lang.editImage.rotateAntiClockwise }}</button>\n\t<button id="ckf-ei-rotate-clockwise" tabindex="{{= it.tabindex }}" data-icon="ckf-rotate-right" data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}">{{= it.lang.editImage.rotateClockwise }}</button>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/RotateView', [
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/Rotate.dot'
            ], function (e, t, n) {
                'use strict';
                return t.extend({
                    name: 'RotateView',
                    template: n,
                    ui: {
                        clockwise: '#ckf-ei-rotate-clockwise',
                        antiClockwise: '#ckf-ei-rotate-anticlockwise'
                    },
                    events: {
                        'click @ui.clockwise': 'onClockwise',
                        'click @ui.antiClockwise': 'onAntiClockwise',
                        'keydown @ui.clockwise': function (t) {
                            t.keyCode !== e.space && t.keyCode !== e.enter || this.onClockwise();
                        },
                        'keydown @ui.antiClockwise': function (t) {
                            t.keyCode !== e.space && t.keyCode !== e.enter || this.onAntiClockwise();
                        }
                    },
                    onClockwise: function () {
                        this.model.unset('lastRotationAngle', { silent: !0 }), this.model.set('lastRotationAngle', 90);
                    },
                    onAntiClockwise: function () {
                        this.model.unset('lastRotationAngle', { silent: !0 }), this.model.set('lastRotationAngle', -90);
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools/RotateTool', [
                'jquery',
                'backbone',
                'CKFinder/Modules/EditImage/Tools/Tool',
                'CKFinder/Modules/EditImage/Views/RotateView'
            ], function (e, t, n, i) {
                'use strict';
                return n.extend({
                    defaults: {
                        name: 'Rotate',
                        viewClass: i,
                        view: null,
                        rotationApplied: !1
                    },
                    initialize: function () {
                        function e() {
                            var e = n.get('editImageData').get('actions');
                            e.remove(e.where({ tool: n.get('name') })), n.viewModel.set('angle', 0), n.viewModel.set('lastRotationAngle', 0);
                        }
                        var n = this;
                        this.viewModel = new t.Model({
                            angle: 0,
                            lastRotationAngle: 0,
                            tabindex: this.get('tabindex')
                        }), this.viewModel.on('change:lastRotationAngle', function (e, t) {
                            this.get('editImageData').get('actions').push({
                                tool: this.get('name'),
                                data: t
                            }), this.set('rotationApplied', !1), this.collection.requestThrottler();
                        }, this), this.collection.on('throttle', function (e) {
                            this.get('rotationApplied') || (e.rotate(this.viewModel.get('lastRotationAngle')), e.render(), this.set('rotationApplied', !0));
                        }, this), this.collection.on('tool:reset:' + this.get('name'), e), this.collection.on('tool:reset:all', e);
                    },
                    saveDeferred: function (t, n) {
                        var i, r;
                        return i = new e.Deferred(), r = i.promise(), n.then(function (e) {
                            e.rotate(t).render(function () {
                                i.resolve(this);
                            });
                        }), r;
                    },
                    getActionData: function () {
                        return this.viewModel;
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/Adjust.dot', [], function () {
                return '{{~ it.filters: filter }}\n<div class="ckf-ei-filter">\n\t<label class="ckf-ei-filter-icon ui-btn ui-btn-icon-left ui-icon-{{= filter.icon }}" for="{{= filter.name }}">{{= filter.label }}</label>\n\t<input class="ckf-ei-filter-slider" name="{{= filter.name }}" id="{{= filter.name }}" min="{{= filter.config.min }}"\n\t\t   max="{{= filter.config.max }}" step="{{= filter.config.step }}" value="{{= filter.config.init }}" type="range"\n\t\t   data-filter="{{= filter.name }}" data-initial="{{= filter.config.init }}" tabindex="{{= it.tabindex }}">\n</div>\n{{~}}\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/AdjustView', [
                'jquery',
                'backbone',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/Adjust.dot'
            ], function (e, t, n, i) {
                'use strict';
                var r = 100;
                return n.extend({
                    isSliding: !1,
                    applyFilterInterval: null,
                    lastFilterEvent: null,
                    name: 'AdjustView',
                    template: i,
                    events: {
                        'slidestart .ckf-ei-filter-slider': 'onSlideStart',
                        'slidestop .ckf-ei-filter-slider': 'onSlideStop',
                        'change .ckf-ei-filter-slider': 'onFilter',
                        'keyup .ckf-ei-filter-slider': 'onFilter'
                    },
                    initialize: function () {
                        this.model.get('activeFilters').on('reset', function () {
                            this.render();
                        }, this);
                    },
                    onSlideStart: function () {
                        this.isSliding = !0;
                    },
                    onSlideStop: function (e) {
                        this.isSliding = !1, this.applyFilters(e);
                    },
                    onRender: function () {
                        this.$el.trigger('create');
                    },
                    onFilter: function (e) {
                        var t = this;
                        t.isSliding || (this.lastFilterEvent = e, this.applyFilterInterval || (this.applyFilterInterval = setInterval(function () {
                            Date.now() - t.lastFilterEvent.timeStamp > 100 && (t.applyFilters(t.lastFilterEvent), clearInterval(t.applyFilterInterval), t.applyFilterInterval = null);
                        }, r)));
                    },
                    applyFilters: function (n) {
                        var i, r, o;
                        o = this.model.get('activeFilters'), r = e(n.currentTarget).data('filter'), i = o.where({ filter: r })[0], i || (i = new t.Model({ filter: r }), o.push(i)), i.set('value', e(n.currentTarget).val());
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools/AdjustTool', [
                'jquery',
                'backbone',
                'underscore',
                'CKFinder/Modules/EditImage/Tools/Tool',
                'CKFinder/Modules/EditImage/Views/AdjustView'
            ], function (e, t, n, i, r) {
                'use strict';
                return i.extend({
                    defaults: function () {
                        var e = this.collection.finder.config, t = [
                                {
                                    name: 'brightness',
                                    icon: 'ckf-brightness',
                                    config: {
                                        min: -100,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'contrast',
                                    icon: 'ckf-contrast',
                                    config: {
                                        min: -100,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'saturation',
                                    icon: 'ckf-saturation',
                                    config: {
                                        min: -100,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'vibrance',
                                    icon: 'ckf-vibrance',
                                    config: {
                                        min: -100,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'exposure',
                                    icon: 'ckf-exposure',
                                    config: {
                                        min: -100,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'hue',
                                    icon: 'ckf-hue',
                                    config: {
                                        min: 0,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'sepia',
                                    icon: 'ckf-sepia',
                                    config: {
                                        min: 0,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'gamma',
                                    icon: 'ckf-gamma',
                                    config: {
                                        min: 0,
                                        max: 10,
                                        step: 0.1,
                                        init: 1
                                    }
                                },
                                {
                                    name: 'noise',
                                    icon: 'ckf-noise',
                                    config: {
                                        min: 0,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'clip',
                                    icon: 'ckf-clip',
                                    config: {
                                        min: 0,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'sharpen',
                                    icon: 'ckf-sharpen',
                                    config: {
                                        min: 0,
                                        max: 100,
                                        step: 1,
                                        init: 0
                                    }
                                },
                                {
                                    name: 'stackBlur',
                                    icon: 'ckf-blur',
                                    config: {
                                        min: 0,
                                        max: 20,
                                        step: 1,
                                        init: 0
                                    }
                                }
                            ], i = n.filter(t, function (t) {
                                return n.contains(e.editImageAdjustments, t.name);
                            });
                        return {
                            name: 'Adjust',
                            viewClass: r,
                            view: null,
                            filters: i
                        };
                    },
                    initialize: function () {
                        function e() {
                            var e = n.get('editImageData').get('actions');
                            e.remove(e.where({ tool: n.get('name') })), i.reset();
                        }
                        var n = this, i = new t.Collection();
                        i.on('add', function () {
                            n.collection.resetTool('Presets');
                        }), n.collection.on('tool:reset:' + n.get('name'), e), n.collection.on('tool:reset:all', e), i.on('change', function () {
                            var e, i, r, o;
                            o = n.get('editImageData'), r = o.get('actions'), i = r.where({ tool: n.get('name') })[0], e = this.toJSON(), i || (i = new t.Model({ tool: n.get('name') }), r.push(i)), i.set('data', e), n.collection.requestThrottler();
                        });
                        var r = new t.Model({
                            filters: this.get('filters'),
                            activeFilters: i,
                            tabindex: this.get('tabindex')
                        });
                        this.on('change:editImageData', function (e, t) {
                            r.set('file', t.get('file'));
                        }), this.collection.on('throttle', function (e) {
                            i.length && i.clone().forEach(function (t) {
                                e[t.get('filter')](parseFloat(t.get('value')));
                            });
                        }), this.viewModel = r, this.activeFilters = i;
                    },
                    getActionData: function () {
                        return this.viewModel;
                    },
                    saveDeferred: function (t, n) {
                        var i = new e.Deferred(), r = i.promise();
                        return n.then(function (n) {
                            e.each(t, function (e, t) {
                                n[t.filter](parseFloat(t.value));
                            }), n.render(function () {
                                i.resolve(this);
                            });
                        }), r;
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/Presets.dot', [], function () {
                return '{{~ it.presets: preset }}\n<button class="ckf-ei-preset" data-preset="{{= preset.name }}" tabindex="{{= it.tabindex }}">\n\t<img class="ckf-ei-preset-preview" alt="{{= preset.label }}" /> {{= preset.label }}\n</button>\n{{~}}\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/PresetsView', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/Presets.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                var o = 240, s = 80;
                return i.extend({
                    name: 'PresetsView',
                    template: r,
                    events: {
                        'click .ckf-ei-preset': 'onPreset',
                        'keydown .ckf-ei-preset': function (e) {
                            e.keyCode !== n.space && e.keyCode !== n.enter || this.onPreset(e);
                        }
                    },
                    onRender: function () {
                        function n() {
                            if (d.length) {
                                var e, r;
                                e = t(d.shift()), r = e.data('preset'), l('#' + u, i, function () {
                                    this.revert(!1), this[r]().render(function () {
                                        e.find('img').attr('src', this.toBase64()), n();
                                    });
                                });
                            } else
                                c.remove();
                        }
                        var i, r = this.model.get('file');
                        if (this.finder.config.initConfigInfo.thumbs) {
                            var a;
                            e.forEach(this.finder.config.initConfigInfo.thumbs, function (e) {
                                var t = parseInt(e.split('x')[0]);
                                !a && t >= o && (a = t);
                            }), a && (i = this.finder.request('file:getThumb', { file: r }));
                        }
                        i && this.finder.config.initConfigInfo.thumbs || (i = this.finder.request('image:previewUrl', {
                            file: r,
                            maxWidth: o,
                            maxHeight: s,
                            noCache: !0
                        }));
                        var l = this.model.get('Caman'), u = e.uniqueId('ckf-'), c = t('<canvas>').attr('id', u).attr('width', o).attr('height', o).css('display', 'none').appendTo('body'), d = this.$el.find('.ckf-ei-preset').toArray();
                        n();
                    },
                    onPreset: function (e) {
                        this.model.set('active', t(e.currentTarget).data('preset'));
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools/PresetsTool', [
                'jquery',
                'underscore',
                'backbone',
                'CKFinder/Modules/EditImage/Tools/Tool',
                'CKFinder/Modules/EditImage/Views/PresetsView'
            ], function (e, t, n, i, r) {
                'use strict';
                return i.extend({
                    defaults: function () {
                        var e, n, i;
                        return e = this.collection.finder.config, n = [
                            { name: 'clarity' },
                            { name: 'concentrate' },
                            { name: 'crossProcess' },
                            { name: 'glowingSun' },
                            { name: 'grungy' },
                            { name: 'hazyDays' },
                            { name: 'hemingway' },
                            { name: 'herMajesty' },
                            { name: 'jarques' },
                            { name: 'lomo' },
                            { name: 'love' },
                            { name: 'nostalgia' },
                            { name: 'oldBoot' },
                            { name: 'orangePeel' },
                            { name: 'pinhole' },
                            { name: 'sinCity' },
                            { name: 'sunrise' },
                            { name: 'vintage' }
                        ], i = t.filter(n, function (n) {
                            return t.contains(e.editImagePresets, n.name);
                        }), {
                            name: 'Presets',
                            viewClass: r,
                            view: null,
                            presets: i
                        };
                    },
                    initialize: function () {
                        function e() {
                            var e = t.get('editImageData').get('actions');
                            i.set('active', null), e.remove(e.where({ tool: t.get('name') }));
                        }
                        var t = this, i = new n.Model({
                                Caman: this.get('Caman'),
                                active: null,
                                presets: this.get('presets'),
                                tabindex: this.get('tabindex')
                            });
                        i.on('change:active', function (e, n) {
                            var i, r;
                            n && (t.collection.resetTool('Adjust'), i = t.get('editImageData'), r = i.get('actions'), r.remove(r.where({ tool: t.get('name') })), r.push({
                                tool: t.get('name'),
                                data: n
                            }), t.collection.requestThrottler());
                        }), t.collection.on('throttle', function (e) {
                            var n = t.viewModel.get('active');
                            n && e[n]();
                        }), t.collection.on('tool:reset:' + t.get('name'), e), t.collection.on('tool:reset:all', e), this.on('change:editImageData', function (e, t) {
                            i.set('file', t.get('file'));
                        }), this.viewModel = i;
                    },
                    saveDeferred: function (t, n) {
                        var i, r;
                        return i = new e.Deferred(), r = i.promise(), n.then(function (e) {
                            e[t]().render(function () {
                                i.resolve(this);
                            });
                        }), r;
                    },
                    getActionData: function () {
                        return this.viewModel;
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/EditImage/Resize.dot', [], function () {
                return '<div class="ui-grid-a">\n\t<div class="ckf-ei-resize-controls-inputs">\n\t\t<input name="ckfResizeWidth" value="{{= it.displayWidth }}" tabindex="{{= it.tabindex }}">\n\t\t<p class="ckf-ei-resize-controls-text">x</p>\n\t\t<input name="ckfResizeHeight" value="{{= it.displayHeight }}" tabindex="{{= it.tabindex }}">\n\t\t<p class="ckf-ei-resize-controls-text">{{= it.lang.units.pixelShort}}</p>\n\t</div>\n</div>\n<label>\n\t{{= it.lang.editImage.keepAspectRatio }}\n\t<input type="checkbox" tabindex="{{= it.tabindex }}" name="ckfResizeKeepAspectRatio" {{? it.keepAspectRatio }}checked="checked"{{?}} data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}">\n</label>\n<button id="ckf-ei-resize-apply" tabindex="{{= it.tabindex }}" data-icon="ckf-tick" data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}">{{= it.lang.editImage.apply }}</button>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/ResizeView', [
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/EditImage/Resize.dot'
            ], function (e, t, n) {
                'use strict';
                return t.extend({
                    name: 'ResizeView',
                    template: n,
                    className: 'ckf-ei-resize-controls',
                    ui: {
                        width: 'input[name="ckfResizeWidth"]',
                        height: 'input[name="ckfResizeHeight"]',
                        keepAspectRatio: 'input[name="ckfResizeKeepAspectRatio"]',
                        apply: '#ckf-ei-resize-apply'
                    },
                    triggers: { 'click @ui.apply': 'apply' },
                    events: {
                        'change @ui.width': 'onWidth',
                        'change @ui.height': 'onHeight',
                        'change @ui.keepAspectRatio': 'onAspectRatio',
                        'keyup @ui.keepAspectRatio': function (t) {
                            t.keyCode !== e.space && t.keyCode !== e.enter || (t.preventDefault(), t.stopPropagation(), this.ui.keepAspectRatio.prop('checked', !this.ui.keepAspectRatio.is(':checked')).checkboxradio('refresh').trigger('change'));
                        },
                        'keydown @ui.apply': function (t) {
                            t.keyCode !== e.space && t.keyCode !== e.enter || this.trigger('apply');
                        }
                    },
                    modelEvents: {
                        'change:realWidth': 'render',
                        'change:displayWidth': 'setWidth',
                        'change:displayHeight': 'setHeight'
                    },
                    onRender: function () {
                        this.$el.trigger('create');
                    },
                    onAspectRatio: function () {
                        var e = this.ui.keepAspectRatio.is(':checked');
                        this.model.set('keepAspectRatio', e), e && this.onWidth();
                    },
                    onWidth: function () {
                        if (!this.dontRender) {
                            var e = this.model.get('displayWidth');
                            if (!(e < 0)) {
                                var t = parseInt(this.ui.width.val(), 10);
                                (isNaN(t) || t <= 0) && (t = 1);
                                var n = this.model.get('realWidth');
                                t > n && (t = n);
                                var i = this.model.get('displayHeight');
                                if (this.model.get('keepAspectRatio')) {
                                    var r = n / this.model.get('realHeight');
                                    i = parseInt(t / r, 10);
                                }
                                i <= 0 && (i = 1), this.updateSizes(t, i);
                            }
                        }
                    },
                    onHeight: function () {
                        if (!this.dontRender) {
                            var e = this.model.get('displayHeight');
                            if (!(e < 0)) {
                                var t = parseInt(this.ui.height.val(), 10), n = this.model.get('realHeight');
                                (isNaN(t) || t <= 0) && (t = 1), t > n && (t = n);
                                var i = this.model.get('displayWidth');
                                if (this.model.get('keepAspectRatio')) {
                                    var r = this.model.get('realWidth') / n;
                                    i = parseInt(t * r, 10);
                                }
                                i <= 0 && (i = 1), this.updateSizes(i, t);
                            }
                        }
                    },
                    updateSizes: function (e, t) {
                        this.model.set({
                            displayWidth: e,
                            displayHeight: t
                        }), this.dontRender = !0, this.ui.width.val(e), this.ui.height.val(t), this.dontRender = !1;
                    },
                    setWidth: function () {
                        this.ui.width.val(this.model.get('displayWidth'));
                    },
                    setHeight: function () {
                        this.ui.height.val(this.model.get('displayHeight'));
                    },
                    focusButton: function () {
                        this.ui.apply.focus();
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools/ResizeTool', [
                'jquery',
                'backbone',
                'CKFinder/Modules/EditImage/Tools/Tool',
                'CKFinder/Modules/EditImage/Views/ResizeView'
            ], function (e, t, n, i) {
                'use strict';
                var r = t.Model.extend({
                    defaults: {
                        realWidth: -1,
                        realHeight: -1,
                        displayWidth: -1,
                        displayHeight: -1,
                        renderWidth: -1,
                        renderHeight: -1,
                        maxRenderWidth: -1,
                        maxRenderHeight: -1,
                        keepAspectRatio: !0
                    }
                });
                return n.extend({
                    defaults: {
                        name: 'Resize',
                        viewClass: i,
                        view: null
                    },
                    initialize: function () {
                        this.viewModel = new r({ tabindex: this.get('tabindex') }), this.collection.on('imageData:ready', function () {
                            var e = this.get('editImageData');
                            this.viewModel.set({
                                realWidth: e.get('imageWidth'),
                                realHeight: e.get('imageHeight'),
                                displayWidth: e.get('imageWidth'),
                                displayHeight: e.get('imageHeight'),
                                renderWidth: e.get('renderWidth'),
                                renderHeight: e.get('renderHeight'),
                                maxRenderWidth: e.get('renderWidth'),
                                maxRenderHeight: e.get('renderHeight')
                            }), this.get('view').on('apply', function () {
                                this.resizeView();
                            }, this);
                        }, this), this.collection.on('tool:reset:all', function () {
                            var e, t;
                            e = this.get('editImageData'), t = e.get('imageInfo'), this.viewModel.set({
                                realWidth: t.width,
                                realHeight: t.height,
                                displayWidth: t.width,
                                displayHeight: t.height,
                                renderWidth: e.get('renderWidth'),
                                renderHeight: e.get('renderHeight'),
                                maxRenderWidth: e.get('renderWidth'),
                                maxRenderHeight: e.get('renderHeight')
                            });
                        }, this);
                    },
                    resizeView: function () {
                        var e, t, n, i = this.viewModel, r = this.get('editImageData'), o = i.get('displayWidth'), s = i.get('displayHeight'), a = i.get('maxRenderWidth'), l = i.get('maxRenderHeight');
                        s > l || o > a ? (e = s > o ? l / s : a / o, t = parseInt(e * s, 10), n = parseInt(e * o, 10)) : (n = o, t = s), i.set({
                            realWidth: o,
                            realHeight: s
                        }), r.get('actions').push({
                            tool: this.get('name'),
                            data: {
                                width: o,
                                height: s
                            }
                        }), r.set({
                            imageWidth: o,
                            imageHeight: s
                        }), r.get('caman').resize({
                            width: n,
                            height: t
                        }), this.collection.requestThrottler(), this.get('view').focusButton();
                    },
                    saveDeferred: function (t, n) {
                        var i = new e.Deferred(), r = i.promise();
                        return n.then(function (e) {
                            e.resize({
                                width: t.width,
                                height: t.height
                            }).render(function () {
                                i.resolve(this);
                            });
                        }), r;
                    },
                    getActionData: function () {
                        return this.viewModel;
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/Tools', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Modules/EditImage/Tools/CropTool',
                'CKFinder/Modules/EditImage/Tools/RotateTool',
                'CKFinder/Modules/EditImage/Tools/AdjustTool',
                'CKFinder/Modules/EditImage/Tools/PresetsTool',
                'CKFinder/Modules/EditImage/Tools/ResizeTool'
            ], function (e, t, n, i, r, o, s, a) {
                'use strict';
                return n.Collection.extend({
                    initialize: function () {
                        this.needRender = !1, this.isRendering = !1, this.on('add', function (e) {
                            e.set('name', e.get('tool').get('name'));
                        });
                    },
                    setupDefault: function (t, n) {
                        this.finder = t, this.Caman = n;
                        var l = 40;
                        this.add({
                            title: t.lang.editImage.resize,
                            icon: 'ckf-resize',
                            tool: new a({ tabindex: l }, { collection: this }),
                            tabindex: l
                        }), this.add({
                            title: t.lang.editImage.crop,
                            icon: 'ckf-crop',
                            tool: new i({ tabindex: l += 10 }, { collection: this }),
                            tabindex: l
                        }), this.add({
                            title: t.lang.editImage.rotate,
                            icon: 'ckf-rotate',
                            tool: new r({ tabindex: l += 10 }, { collection: this }),
                            tabindex: l
                        });
                        var u = t.config.editImageAdjustments;
                        if (u && u.length) {
                            var c = new o({ tabindex: l += 10 }, { collection: this });
                            this.add({
                                title: t.lang.editImage.adjust,
                                icon: 'ckf-adjust',
                                tool: c,
                                tabindex: l
                            }), e.forEach(c.get('filters'), function (e) {
                                e.label = t.lang.editImage.filters[e.name];
                            });
                        }
                        var d = t.config.editImagePresets;
                        if (d && d.length) {
                            var f = new s({
                                Caman: n,
                                tabindex: l += 10
                            }, { collection: this });
                            this.add({
                                title: t.lang.editImage.presets,
                                icon: 'ckf-presets',
                                tool: f,
                                tabindex: l
                            }), e.forEach(f.get('presets'), function (e) {
                                e.label = t.lang.editImage.preset[e.name];
                            });
                        }
                        return this;
                    },
                    setImageData: function (e) {
                        this.editImageData = e, e.on('change:renderHeight', function () {
                            this.checkReady();
                        }, this), this.forEach(function (t) {
                            t.get('tool').set('editImageData', e);
                        });
                    },
                    setImageInfo: function (e) {
                        this.editImageData.set('imageInfo', e), this.editImageData.set('imageWidth', e.width), this.editImageData.set('imageHeight', e.height), this.checkReady();
                    },
                    checkReady: function () {
                        this.editImageData && this.editImageData.has('imageInfo') && this.editImageData.has('renderWidth') && this.trigger('imageData:ready');
                    },
                    resetTool: function (e) {
                        var t;
                        e ? this.trigger('tool:reset:' + e) : (this.trigger('tool:reset:all'), t = this.editImageData.get('caman'), t.reset(), t.render(), this.editImageData.get('actions').reset()), this.trigger('tool:reset:after');
                    },
                    doSave: function (n) {
                        var i = this, r = e.uniqueId('edit-image-canvas'), o = t('<canvas>').attr('id', r).css('display', 'none').appendTo('body'), s = this.editImageData.get('actions'), a = this.Caman, l = new t.Deferred(), u = new t.Deferred(), c = l.promise();
                        return a('#' + r, n, function () {
                            var e = this, t = s.findWhere({ tool: 'Adjust' });
                            t && (s.remove(t), s.push(t));
                            var n = s.findWhere({ tool: 'Presets' });
                            n && (s.remove(n), s.push(n)), s.forEach(function (e) {
                                var t = this.findWhere({ name: e.get('tool') }).get('tool');
                                c = t.saveDeferred(e.get('data'), c);
                            }, i), c.then(function () {
                                u.resolve(e.toBase64()), o.remove();
                            }), l.resolve(e);
                        }), u.promise();
                    },
                    requestThrottler: function () {
                        var e = this;
                        this.needRender = !0, this.throttleID || (this.throttleID = setInterval(function () {
                            if (e.needRender && !e.isRendering) {
                                e.isRendering = !0;
                                var t = e.editImageData.get('caman');
                                try {
                                    t.revert(!1);
                                } catch (e) {
                                }
                                e.trigger('throttle', t), t.render(function () {
                                    return !1;
                                }), e.isRendering = !1, e.needRender = !1;
                            }
                        }, 200));
                    },
                    destroy: function () {
                        this.throttleID && clearInterval(this.throttleID);
                    },
                    hasDataToSave: function () {
                        return !!this.editImageData.get('actions').length;
                    }
                });
            }), CKFinder.define('CKFinder/Common/Models/ProgressModel', ['backbone'], function (e) {
                'use strict';
                var t = e.Model.extend({
                    defaults: {
                        state: 'ok',
                        message: '',
                        value: 0
                    },
                    stateOk: function () {
                        this.set('state', 'ok');
                    },
                    stateError: function () {
                        this.set('state', 'error');
                    },
                    stateIndeterminate: function () {
                        this.set('state', 'indeterminate');
                    }
                });
                return t;
            }), CKFinder.define('CKFinder/Modules/EditImage/Models/ProgressModel', ['CKFinder/Common/Models/ProgressModel'], function (e) {
                'use strict';
                var t = e.extend({
                    defaults: {
                        value: 0,
                        state: 'ok',
                        message: '',
                        eta: '',
                        speed: '',
                        bytes: 0,
                        bytesTotal: 0,
                        time: 0,
                        transfer: ''
                    },
                    initialize: function () {
                        this.on('change', function (e) {
                            var t, n;
                            if (e.changed.time && (t = e.previous('time'))) {
                                var i = e.get('time') - t, r = e.get('bytes') - e.previous('bytes');
                                n = (r / i).toFixed(1), this.set({
                                    eta: ((e.get('bytesTotal') - e.get('bytes')) / (100 * n)).toFixed(),
                                    speed: n
                                });
                            }
                        });
                    }
                });
                return t;
            }), CKFinder.define('text!CKFinder/Templates/Common/Progress.dot', [], function () {
                return '<div class="ckf-progress-message {{? !it.message }}ckf-hidden{{?}}">{{= it.message }}</div>\n<div class="ckf-progress-wrap ckf-progress-{{= it.state }}" role="progressbar" aria-valuenow="{{= it.value }}" aria-valuemin="0" aria-valuemax="100">\n\t<div class="ckf-progress-bar" style="width:{{= it.value }}%;" ></div>\n</div>\n';
            }), CKFinder.define('CKFinder/Common/Views/ProgressView', [
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/Common/Progress.dot'
            ], function (e, t) {
                'use strict';
                var n = e.extend({
                    name: 'ProgressView',
                    template: t,
                    className: 'ckf-progress',
                    modelEvents: {
                        'change:message': 'updateMessage',
                        'change:state': 'updateState',
                        'change:value': 'updateValue'
                    },
                    ui: {
                        bar: '.ckf-progress-bar',
                        message: '.ckf-progress-message',
                        wrap: '.ckf-progress-wrap'
                    },
                    onRender: function () {
                        this.$el.trigger('create');
                    },
                    updateMessage: function (e, t) {
                        this.ui.message.text(t).toggleClass('ckf-hidden', !t);
                    },
                    updateState: function (e, t) {
                        this.ui.wrap.toggleClass('ckf-progress-ok', t === 'ok').toggleClass('ckf-progress-error', t === 'error').toggleClass('ckf-progress-indeterminate', t === 'indeterminate');
                    },
                    updateValue: function (e, t) {
                        this.isDestroyed || (this.ui.bar.css({ width: t + '%' }), this.ui.wrap.attr('aria-valuenow', t));
                    }
                });
                return n;
            }), CKFinder.define('text!CKFinder/Templates/EditImage/ProgressDialog.dot', [], function () {
                return '<div id="ckf-ei-progress"></div>\n<div class="ckf-ei-transfer">{{= it.transfer }}</div>\n\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/ProgressDialogView', [
                'underscore',
                'jquery',
                'CKFinder/Views/Base/LayoutView',
                'CKFinder/Common/Views/ProgressView',
                'text!CKFinder/Templates/EditImage/ProgressDialog.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                var o = n.extend({
                    name: 'EditImageProgressDialogView',
                    template: r,
                    regions: { progress: '#ckf-ei-progress' },
                    ui: { transfer: '.ckf-ei-transfer' },
                    modelEvents: { change: 'updateTransfer' },
                    onRender: function () {
                        this.$el.trigger('create'), this.progress.show(new i({
                            finder: this.finder,
                            model: this.model
                        }));
                    },
                    updateTransfer: function () {
                        this.ui.transfer.text(this.model.get('transfer'));
                    }
                });
                return o;
            }), CKFinder.define('CKFinder/Models/File', ['backbone'], function (e) {
                'use strict';
                var t = e.Model.extend({
                    defaults: {
                        name: '',
                        date: '',
                        size: -1,
                        folder: null,
                        'view:isFolder': !1
                    },
                    initialize: function () {
                        this._extenstion = !1, this.on('change:name', function () {
                            this._extenstion = !1;
                        }, this);
                    },
                    getExtension: function () {
                        return this._extension || (this._extenstion = this.constructor.extensionFromFileName(this.get('name'))), this._extenstion;
                    },
                    getUrl: function () {
                        if (!this.has('url')) {
                            var e = this.get('folder').getUrl();
                            this.set('url', e && e + encodeURIComponent(this.get('name')), { silent: !0 });
                        }
                        return this.get('url');
                    },
                    isImage: function () {
                        return this.constructor.isExtensionOfImage(this.getExtension());
                    },
                    refresh: function () {
                        this.trigger('refresh', this);
                    }
                }, {
                    invalidCharacters: '\n\\ / : * ? " < > |',
                    isValidName: function (e) {
                        var t = /[\\\/:\*\?"<>\|]/;
                        return !t.test(e);
                    },
                    isExtensionOfImage: function (e) {
                        return /jpeg|jpg|gif|png/.test(e.toLowerCase());
                    },
                    extensionFromFileName: function (e) {
                        return e.substr(e.lastIndexOf('.') + 1);
                    },
                    trimFileName: function (e) {
                        var t = e.lastIndexOf('.');
                        return t < 0 ? e.trim() : e.substr(0, t).trim() + '.' + e.substr(t + 1).trim();
                    }
                });
                return t;
            }), CKFinder.define('text!CKFinder/Templates/EditImage/ConfirmDialog.dot', [], function () {
                return '{{? !it.onlyOverwrite }}<label>\n    {{= it.lang.editImage.saveDialogOverwrite }}\n\t<input tabindex="1" type="checkbox" name="ckfEditImageOverwrite" {{? it.overwrite }}checked="checked"{{?}}>\n</label>\n{{?}}\n<div class="filename-input-area" {{? it.overwrite }}style="display:none" aria-hidden="true"{{?}}>\n    {{= it.lang.editImage.saveDialogSaveAs }}\n    <div>\n        <span class="filename-extension-label">.{{! it.extension }}</span>\n        <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">\n    \t\t<input tabindex="1" data-enhanced="true" type="text" name="ckfEditImageFileName" value="{{! it.name }}" aria-required="true" dir="auto" />\n        </div>\n    </div>\n\n    <p class="ckf-ei-confirm-error error-message"></p>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/EditImage/Views/ConfirmDialogView', [
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Models/File',
                'text!CKFinder/Templates/EditImage/ConfirmDialog.dot'
            ], function (e, t, n) {
                'use strict';
                return e.extend({
                    name: 'EditImageConfirmDialog',
                    template: n,
                    className: 'ckf-ei-crop-controls',
                    ui: {
                        error: '.ckf-ei-confirm-error',
                        overwrite: 'input[name="ckfEditImageOverwrite"]',
                        fileName: 'input[name="ckfEditImageFileName"]',
                        fileNameInputArea: '.filename-input-area'
                    },
                    events: {
                        'change @ui.overwrite': function (e) {
                            e.stopPropagation(), e.preventDefault();
                            var t = this.ui.overwrite.is(':checked');
                            t ? (this.model.set('name', this.model.get('originalName')), this.model.unset('error'), this.ui.fileNameInputArea.hide().attr('aria-hidden', 'true')) : this.ui.fileNameInputArea.show().removeAttr('aria-hidden'), this.model.set('overwrite', t);
                        },
                        'input @ui.fileName': function () {
                            var e = this.ui.fileName.val().toString();
                            if (t.isValidName(e))
                                this.model.unset('error');
                            else {
                                var n = this.finder.lang.errors.fileInvalidCharacters.replace('{disallowedCharacters}', t.invalidCharacters);
                                this.model.set('error', n);
                            }
                            this.model.set('name', e);
                        }
                    },
                    modelEvents: {
                        'change:error': function (e, t) {
                            t ? (this.ui.fileName.attr('aria-invalid', 'true'), this.ui.error.show().removeAttr('aria-hidden').html(t)) : (this.ui.error.hide().attr('aria-hidden', 'true'), this.ui.fileName.removeAttr('aria-invalid'));
                        }
                    }
                });
            }), CKFinder.define('CKFinder/Modules/EditImage/EditImage', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Modules/EditImage/Views/EditImageLayout',
                'CKFinder/Modules/EditImage/Views/ImagePreviewView',
                'CKFinder/Modules/EditImage/Views/ActionsView',
                'CKFinder/Modules/EditImage/Models/EditImageData',
                'CKFinder/Modules/EditImage/Tools',
                'CKFinder/Modules/EditImage/Models/ProgressModel',
                'CKFinder/Modules/EditImage/Views/ProgressDialogView',
                'CKFinder/Modules/EditImage/Views/ConfirmDialogView'
            ], function (e, t, n, i, r, o, s, a, l, u, c) {
                'use strict';
                function d(e) {
                    var t = this;
                    this.finder = e, e.on('contextMenu:file:edit', f, this), e.on('toolbar:reset:Main:file', function (n) {
                        var i = n.data.file;
                        y(i) && n.data.toolbar.push({
                            type: 'button',
                            name: 'EditImage',
                            priority: 50,
                            icon: 'ckf-file-edit',
                            label: n.finder.lang.common.edit,
                            action: function () {
                                h(t, e.request('files:getSelected').first());
                            }
                        });
                    }), e.on('toolbar:reset:EditImage', function (t) {
                        var i = this;
                        t.data.toolbar.push({
                            icon: e.lang.dir === 'ltr' ? 'ckf-back' : 'ckf-forward',
                            name: 'Close',
                            iconOnly: !0,
                            label: t.finder.lang.common.close,
                            type: 'button',
                            alwaysVisible: !0,
                            action: function () {
                                return t.data.tools.hasDataToSave() ? void e.request('dialog:confirm', {
                                    name: 'ConfirmEditImageExit',
                                    msg: e.lang.editImage.confirmExit
                                }) : void e.request('page:destroy', { name: 'EditImage' });
                            }
                        }), t.data.toolbar.push({
                            type: 'text',
                            name: 'Filename',
                            className: 'ckf-ei-toolbar-filename',
                            label: e.util.escapeHtml(t.data.tools.editImageData.get('file').get('name'))
                        }), t.data.toolbar.push({
                            name: 'Save',
                            label: e.lang.editImage.save,
                            icon: 'ckf-save',
                            alignment: 'secondary',
                            alwaysVisible: !0,
                            type: 'button',
                            action: function () {
                                v(i, t.data.tools);
                            }
                        }), this.resetButton = new n.Model({
                            name: 'Reset',
                            label: e.lang.editImage.reset,
                            icon: 'ckf-reset',
                            alignment: 'secondary',
                            alwaysVisible: !0,
                            isDisabled: !0,
                            type: 'button',
                            action: function () {
                                t.data.tools.resetTool();
                            }
                        }), t.data.toolbar.push(this.resetButton);
                    }, this, null, 40), e.on('dialog:EditImageConfirm:ok', function (n) {
                        var i = n.data.context;
                        if (!i.viewModel.get('error')) {
                            var r = i.viewModel.get('name'), o = r + '.' + i.viewModel.get('extension'), s = i.viewModel.get('overwrite');
                            return !s && e.request('files:getCurrent').where({ name: o }).length ? void i.viewModel.set('error', n.finder.lang.editImage.saveDialogFileExists) : void m(t, i.tools, i.viewModel.get('oldName') !== o && o);
                        }
                    }), e.on('dialog:ConfirmEditImageExit:ok', function () {
                        e.request('page:destroy', { name: 'EditImage' });
                    }), e.on('command:error:SaveImage', function () {
                        e.request('page:destroy', { name: 'EditImage' });
                    }, null, null, 5);
                }
                function f(e) {
                    var t = this, n = e.data.context.file.get('folder').get('acl');
                    y(e.data.context.file) && e.data.items.add({
                        name: 'EditImage',
                        label: t.finder.lang.common.edit,
                        isActive: n.fileView && n.fileRename,
                        icon: 'ckf-file-edit',
                        action: function () {
                            h(t, e.data.context.file);
                        }
                    });
                }
                function h(t, n) {
                    if (e.isUndefined(C)) {
                        var i = CKFinder.require.toUrl(t.finder.config.caman || 'libs/caman') + '.js?ver=i42irv';
                        CKFinder.require([i], function (e) {
                            C = e || window.Caman, g(t, n);
                        });
                    } else
                        g(t, n);
                }
                function g(e, t) {
                    var n = e.finder, l = new a();
                    l.setupDefault(n, C), l.on('throttle', function () {
                        n.fire('editImage:renderPreview', { actions: f.get('actions').clone() }, n);
                    });
                    var u = new i({ finder: n }), c = new r({ finder: n }), d = new o({
                            finder: n,
                            collection: l
                        });
                    n.once('page:show:EditImage', function () {
                        u.preview.show(c), u.actions.show(d), u.$el.trigger('create'), n.request('toolbar:reset', {
                            name: 'EditImage',
                            context: { tools: l }
                        });
                        var e = C(c.ui.canvas.selector, f.get('imagePreview'), function () {
                            n.request('loader:hide'), d.focusFirst(), f.set({
                                renderWidth: c.ui.canvas.width(),
                                renderHeight: c.ui.canvas.height()
                            });
                        });
                        f.set('caman', e);
                    });
                    var f = new s({
                        file: t,
                        imagePreview: n.request('image:previewUrl', {
                            file: t,
                            maxWidth: 0.8 * window.innerWidth,
                            maxHeight: 0.8 * window.innerHeight,
                            noCache: !0
                        }),
                        fullImagePreview: n.request('image:previewUrl', {
                            file: t,
                            maxWidth: 1000000,
                            maxHeight: 1000000,
                            noCache: !0
                        })
                    });
                    l.setImageData(f);
                    var h = f.get('actions');
                    h.on('add', function () {
                        e.resetButton && e.resetButton.set('isDisabled', !1);
                    }), h.on('reset', function () {
                        e.resetButton && e.resetButton.set('isDisabled', !0);
                    }), n.request('loader:show', { text: n.lang.editImage.loading }), n.request('command:send', {
                        name: 'ImageInfo',
                        folder: t.get('folder'),
                        params: { fileName: t.get('name') }
                    }).done(function (e) {
                        function i() {
                            l.trigger('ui:resize');
                        }
                        if (e.error && 117 === e.error.number)
                            return n.once('command:error:ImageInfo', function (e) {
                                e.cancel();
                            }), n.request('loader:hide'), n.request('folder:refreshFiles'), void n.request('dialog:info', { msg: n.lang.errors.missingFile });
                        var r = {
                            width: e.width,
                            height: e.height,
                            size: e.size
                        };
                        t.set('imageInfo', r), l.setImageInfo(r), n.util.isWidget() && p(n), n.once('page:create:EditImage', function () {
                            n.request('toolbar:create', {
                                name: 'EditImage',
                                page: 'EditImage'
                            });
                        }), n.request('page:create', {
                            view: u,
                            title: n.lang.editImage.title,
                            name: 'EditImage',
                            className: 'ckf-ei-page'
                        }), n.request('page:show', { name: 'EditImage' }), n.request('loader:show', { text: n.lang.editImage.loading }), d.on('childview:expand', function () {
                            u.onActionsExpand();
                        }).on('childview:collapse', function () {
                            u.onActionsCollapse();
                        }), n.on('ui:resize', i), n.once('page:destroy:EditImage', function () {
                            n.removeListener('ui:resize', i);
                        });
                    });
                }
                function p(e) {
                    function t() {
                        i = !1, e.removeListener('minimized', t);
                    }
                    function n() {
                        i && e.request('minimize'), e.removeListener('page:destroy:EditImage', n), e.removeListener('minimized', t);
                    }
                    var i = !1;
                    e.request('isMaximized') || (e.request('maximize'), i = !0), e.once('minimized', t), e.once('page:destroy:EditImage', n);
                }
                function v(e, t) {
                    if (t.hasDataToSave()) {
                        var i = e.finder, r = t.editImageData.get('file'), o = r.getExtension(), s = r.get('name');
                        if (o) {
                            var a = s.lastIndexOf('.' + o);
                            a > 0 && (s = s.substr(0, a));
                        }
                        var l = r.get('folder').get('acl').fileDelete, u = new n.Model({
                                onlyOverwrite: !l,
                                overwrite: l,
                                oldName: r.get('name'),
                                name: s,
                                originalName: s,
                                extension: o,
                                tools: t,
                                error: !1
                            }), d = i.request('dialog', {
                                view: new c({
                                    finder: i,
                                    model: u
                                }),
                                title: i.lang.editImage.saveDialogTitle,
                                name: 'EditImageConfirm',
                                buttons: [
                                    'ok',
                                    'cancel'
                                ],
                                context: {
                                    viewModel: u,
                                    tools: t
                                }
                            });
                        u.on('change:error', function (e, t) {
                            t ? d.disableButton('ok') : d.enableButton('ok');
                        });
                    }
                }
                function m(e, t, n) {
                    function i() {
                        c && c.abort(), r.request('dialog:destroy');
                    }
                    var r = e.finder, o = t.editImageData, s = new l(), a = new u({
                            finder: r,
                            model: s
                        });
                    if (r.request('dialog', {
                            view: a,
                            title: r.lang.editImage.saveDialogTitle,
                            name: 'EditImageSaveProgress',
                            buttons: ['cancel']
                        }), r.on('dialog:EditImageSaveProgress:cancel', i), s.set('message', r.lang.editImage.downloadAction), !window.URL || !window.URL.createObjectURL)
                        return s.stateIndeterminate(), void w(o.get('fullImagePreview'), t, r, s, n);
                    s.set({
                        bytes: 0,
                        bytesTotal: 0,
                        value: 0,
                        time: new Date().getTime()
                    });
                    var c = new XMLHttpRequest();
                    c.onprogress = function (e) {
                        e.lengthComputable && (s.set({
                            state: 'normal',
                            bytes: e.loaded,
                            bytesTotal: e.total,
                            value: e.loaded / e.total * b,
                            time: new Date().getTime()
                        }), s.set('transfer', r.lang.formatTransfer(s.get('speed')))), e.lengthComputable || s.set({
                            value: x,
                            state: 'indeterminate',
                            transfer: ''
                        });
                    }, c.onload = function () {
                        return r.removeListener('dialog:EditImageSaveProgress:cancel', i), 200 !== this.status ? (r.request('folder:refreshFiles'), r.request('page:destroy', { name: 'EditImage' }), void r.request('dialog:info', { msg: r.lang.errors.missingFile })) : (s.set({
                            value: b,
                            eta: !1,
                            speed: !1,
                            time: 0
                        }), void w(window.URL.createObjectURL(new Blob([this.response])), t, r, s, n));
                    }, c.open('GET', o.get('fullImagePreview'), !0), c.responseType = 'arraybuffer', c.send(null);
                }
                function w(e, t, n, i, r) {
                    i.set({
                        value: b,
                        message: n.lang.editImage.transformationAction
                    }), t.doSave(e).then(function (e) {
                        function o() {
                            l && l.abort(), n.request('dialog:destroy');
                        }
                        i.set({
                            value: E,
                            message: n.lang.editImage.uploadAction
                        });
                        var s = t.editImageData.get('file'), a = s.get('folder');
                        n.once('command:after:SaveImage', function (e) {
                            e.data.response.error || (i.set({
                                state: 'normal',
                                value: F,
                                message: ''
                            }), s.set({
                                date: e.data.response.date,
                                size: e.data.response.size
                            }), n.once('page:show:Main', function () {
                                e.data.context.isFileNameChanged ? n.request('folder:refreshFiles') : s.refresh();
                            }), n.request('page:destroy', { name: 'EditImage' }));
                        }), i.set({
                            bytes: 0,
                            bytesTotal: 0,
                            value: E,
                            message: n.lang.editImage.uploadAction,
                            time: new Date().getTime()
                        }), n.on('dialog:EditImageSaveProgress:cancel', o);
                        var l = n.request('command:send', {
                            name: 'SaveImage',
                            type: 'post',
                            folder: a,
                            params: { fileName: r ? r : s.get('name') },
                            post: { content: e },
                            context: {
                                file: s,
                                isFileNameChanged: !!r
                            },
                            returnTransport: !0,
                            uploadProgress: function (e) {
                                e.lengthComputable && (i.set({
                                    bytes: e.loaded,
                                    bytesTotal: e.total,
                                    value: e.loaded / e.total * (_ - E) + E,
                                    time: new Date().getTime()
                                }), i.set('transfer', n.lang.formatTransfer(i.get('speed')))), e.lengthComputable || i.set({
                                    state: 'indeterminate',
                                    transfer: !1
                                });
                            },
                            uploadEnd: function () {
                                i.set('state', 'normal'), n.removeListener('dialog:EditImageSaveProgress:cancel', o);
                            }
                        });
                        t.destroy();
                    });
                }
                function y(e) {
                    return e.isImage() && e.get('folder').get('acl').fileRename && e.get('folder').get('acl').fileUpload;
                }
                var C, b = 33, x = 20, E = 35, _ = 98, F = 100;
                return d;
            }), CKFinder.define('CKFinder/Modules/FileDownload/FileDownload', [
                'underscore',
                'jquery'
            ], function (e, t) {
                'use strict';
                function n(n) {
                    var o = e.uniqueId('ckf-download-frame');
                    n.setHandler('file:download', function (e) {
                        var i = e.file.get('folder'), r = n.request('command:url', {
                                command: 'DownloadFile',
                                folder: i,
                                params: { fileName: e.file.get('name') }
                            }), s = t('#' + o);
                        s.length || (s = t('<iframe>'), s.attr('id', o), s.css('display', 'none'), s.on('load', function () {
                            var e = t(s.get(0).contentDocument).text();
                            if (e.length)
                                try {
                                    var i = JSON.parse(e);
                                    i.error && 117 === i.error.number && (n.request('folder:refreshFiles'), n.request('dialog:info', { msg: n.lang.errors.missingFile }));
                                } catch (e) {
                                }
                        }), t('body').append(s)), s.attr('src', r);
                    }), n.on('toolbar:reset:Main:file', i), n.on('contextMenu:file', function (e) {
                        e.data.groups.add({ name: 'view' });
                    }, null, null, 20), n.on('contextMenu:file:view', r, null, null, 20);
                }
                function i(e) {
                    var t = {
                        name: 'Download',
                        priority: 70,
                        icon: 'ckf-file-download',
                        label: e.finder.lang.common.download
                    };
                    if (o) {
                        var n = e.finder.request('files:getSelected').first(), i = e.finder.request('command:url', {
                                command: 'DownloadFile',
                                folder: n.get('folder'),
                                params: { fileName: n.get('name') }
                            });
                        t.type = 'link-button', t.href = i, t.attributes = { target: '_blank' };
                    } else
                        t.type = 'button', t.action = function () {
                            e.finder.request('file:download', { file: e.finder.request('files:getSelected').first() });
                        };
                    e.data.toolbar.push(t);
                }
                function r(e) {
                    var t = e.data, n = t.context.file, i = n.get('folder').get('acl'), r = e.finder.request('files:getSelected');
                    r.length && !r.contains(n) && e.finder.request('files:deselectAll'), e.finder.request('files:select', { files: n });
                    var s = {
                        name: 'Download',
                        label: e.finder.lang.common.download,
                        isActive: i.fileView,
                        icon: 'ckf-file-download'
                    };
                    o ? (s.allowClick = !0, s.linkAttributes = [
                        {
                            name: 'target',
                            value: '_blank'
                        },
                        {
                            name: 'href',
                            value: e.finder.request('command:url', {
                                command: 'DownloadFile',
                                folder: n.get('folder'),
                                params: { fileName: n.get('name') }
                            })
                        }
                    ]) : s.action = function () {
                        e.finder.request('file:download', { file: n });
                    }, t.items.add(s);
                }
                var o = /iPad|iPhone|iPod/.test(navigator.platform);
                return n;
            }), CKFinder.define('text!CKFinder/Templates/FilePreview/Gallery.dot', [], function () {
                return '<div class="ckf-file-preview-root" style="position:fixed;top:0;left:0;bottom:0;right:0;background:rgba(0,0,0,0.8);z-index:9010;font-family:Arial, Helvetica, Tahoma, Verdana, sans-serif;" tabindex="0" role="application">\n\t<div class="ckf-file-preview" style="position:absolute;top:0;left:0;bottom:2em;right:0;margin:auto;"></div>\n\t<div class="ckf-file-preview-info"\n\t\tstyle="position:absolute;left:0;bottom:0;right:0;margin:auto;color:#fff;background:#000;padding:0.5em 1em;max-height:2em;line-height:1em;font-size:1em;">\n\t\t<div class="ckf-file-preview-info-name" style="float:left;"></div>\n\t\t<div class="ckf-file-preview-info-count" style="float:right;"></div>\n\t</div>\n\t<button class="ckf-file-preview-button-prev" style="position:absolute;top:50%;background:linear-gradient(to bottom, #fff 0, #e4e4e4 100%);border-radius:.3125em;border:1px solid #b6b6b6;box-shadow:0 1px 0 rgba(255, 255, 255, 0.5), 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 1px 0 rgba(255, 255, 255, 0.15) inset;box-sizing:border-box;color:#333;font-size:12.5px;font-weight:bold;line-height:1.3em;margin:5px 3px;padding:5px 10px;text-shadow:0 1px 0 #f3f3f3;-webkit-appearance:none;-moz-appearance:none;display:inline-block;vertical-align:middle;">&laquo;</button>\n\t<button class="ckf-file-preview-button-next" style="position:absolute;top:50%;background:linear-gradient(to bottom, #fff 0, #e4e4e4 100%);border-radius:.3125em;border:1px solid #b6b6b6;box-shadow:0 1px 0 rgba(255, 255, 255, 0.5), 0 0 2px rgba(255, 255, 255, 0.15) inset, 0 1px 0 rgba(255, 255, 255, 0.15) inset;box-sizing:border-box;color:#333;font-size:12.5px;font-weight:bold;line-height:1.3em;margin:5px 3px;padding:5px 10px;text-shadow:0 1px 0 #f3f3f3;-webkit-appearance:none;-moz-appearance:none;display:inline-block;vertical-align:middle;">&raquo;</button>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/FilePreview/FilePreview', [
                'underscore',
                'jquery',
                'doT',
                'backbone',
                'CKFinder/Util/KeyCode',
                'text!CKFinder/Templates/FilePreview/Gallery.dot',
                'CKFinder/Models/File'
            ], function (e, t, n, i, r, o, s) {
                'use strict';
                function a(e) {
                    e.setHandlers({
                        'image:previewUrl': function (t) {
                            var n, i;
                            return n = t.file.get('folder'), i = {
                                fileName: t.file.get('name'),
                                size: Math.round(t.maxWidth) + 'x' + Math.round(t.maxHeight),
                                date: t.file.get('date')
                            }, t.noCache && (i.d = new Date().getTime()), e.request('command:url', {
                                command: 'ImagePreview',
                                params: i,
                                folder: n
                            });
                        },
                        'file:preview': function (t) {
                            var n = t && t.file || e.request('files:getCurrent').first();
                            n && l(e, n.get('name'));
                        }
                    }), e.on('file:preview', function (n) {
                        function i(e, t) {
                            t.find('iframe').attr('src', e).css('display', ''), t.find('img').remove();
                        }
                        var r = n.data.url, o = n.data.extension.toLocaleLowerCase();
                        if (s.isExtensionOfImage(o) && (n.stop(), n.data.templateData.url = r, e.hasHandler('image:previewUrl') && (n.data.templateData.url = e.request('image:previewUrl', {
                                file: n.data.file,
                                maxWidth: 0.95 * t(window.top).width(),
                                maxHeight: 0.95 * t(window.top).height()
                            })), n.data.template = m, n.data.events = {
                                load: function (e) {
                                    e.target.id && t(e.target).css('display', '').prev().remove();
                                }
                            }), /^(flac|mp3|ogg|opus|wav|weba)$/.test(o) && c(o) && (n.stop(), n.data.templateData.url = r, n.data.template = w, n.data.events = {
                                click: function (e) {
                                    e.stopPropagation();
                                }
                            }), /^(mp4|ogv|webm)$/.test(o) && d(o) && (n.stop(), n.data.templateData.url = r, n.data.template = y, n.data.events = {
                                click: function (e) {
                                    e.stopPropagation();
                                }
                            }), /^(pdf)$/.test(o) && (n.stop(), n.data.template = r ? C : b, n.data.templateData.url = r ? r : '', n.data.afterRender = function (e) {
                                setTimeout(function () {
                                    e.closest('[tabindex]').focus();
                                }, 500);
                            }, !r)) {
                            var a = n.data.file;
                            n.data.events = {
                                load: function (n) {
                                    if (n.currentTarget.alt)
                                        if (a.get('folder').getResourceType().get('useProxyCommand')) {
                                            var r = e.request('file:getProxyUrl', {
                                                file: a,
                                                cache: 86400,
                                                params: { d: a.get('date') }
                                            });
                                            i(r, t(n.currentTarget).parent());
                                        } else
                                            e.request('file:getUrl', { file: a }).then(function (e) {
                                                i(e, t(n.currentTarget).parent());
                                            });
                                }
                            };
                        }
                    }, null, null, 90), e.on('contextMenu:file:view', function (t) {
                        t.data.items.add({
                            name: 'View',
                            label: t.finder.lang.common.view,
                            isActive: t.data.context.file.get('folder').get('acl').fileView,
                            icon: 'ckf-view',
                            action: function () {
                                l(e, t.data.context.file.get('name'));
                            }
                        });
                    }, null, null, 10), e.on('toolbar:reset:Main:file', function (e) {
                        var t = e.finder;
                        e.data.toolbar.push({
                            name: 'View',
                            icon: 'ckf-view',
                            label: t.lang.common.view,
                            type: 'button',
                            priority: 80,
                            action: function () {
                                l(t, e.data.file.get('name'));
                            }
                        });
                    });
                }
                function l(i, s) {
                    function a() {
                        var r, o, s, a, l, u;
                        _.current <= 0 ? (_.current = 0, y.hide()) : y.show(), _.current >= _.last ? (_.current = _.last, w.hide()) : w.show(), o = _.files[_.current], s = o.url, a = o.name, l = a.substr(a.lastIndexOf('.') + 1), u = i.fire('file:preview', {
                            templateData: {
                                fileIcon: function () {
                                    var e = t(f).width(), n = t(f).height();
                                    return i.request('file:getIcon', {
                                        size: e > n ? e : n,
                                        file: o.file
                                    });
                                },
                                fileName: a
                            },
                            file: o.file,
                            url: s,
                            extension: l,
                            template: x
                        }, i), C.text(o.name), b.text(_.current + 1 + ' / ' + _.files.length), i.request('files:deselectAll'), i.request('files:select', { files: c[_.current] }), r = t(n.template(u.template)(u.templateData), f), u.events && e.forEach(u.events, function (e, t) {
                            r.on(t, e);
                        }), m.append(r), e.isFunction(u.afterRender) && u.afterRender(r), i.request('focus:trap', { node: p });
                    }
                    function l(e, t) {
                        m.html(''), e.stopPropagation(), _.current += t, a();
                    }
                    function u() {
                        E && E.remove(), p.remove();
                        var e = c[_.current];
                        e.trigger('focus', e);
                    }
                    var c = i.request('files:getDisplayed').where({ 'view:isFolder': !1 }), d = [], f = window.top.document, h = n.template(o), g = 0, p = t(h(), f);
                    p.attr('dir', i.lang.dir);
                    var m = p.find('.ckf-file-preview'), w = p.find('.ckf-file-preview-button-next'), y = p.find('.ckf-file-preview-button-prev'), C = p.find('.ckf-file-preview-info-name'), b = p.find('.ckf-file-preview-info-count');
                    i.lang.dir === 'ltr' ? (w.css('right', '0.5em'), y.css('left', '0.5em')) : (w.css('left', '0.5em'), y.css('right', '0.5em')), c.forEach(function (e, t) {
                        var n = e.getUrl(), i = e.get('name');
                        d.push({
                            url: n,
                            name: i,
                            file: e
                        }), i === s && (g = t);
                    });
                    var E, _ = {
                            files: d,
                            current: g,
                            last: d.length - 1
                        };
                    i.util.isWidget() && (E = t(v).appendTo(t('body', f))), p.append(m).append(y).append(w).appendTo(t('body', f)), p.focus(), p.on('click', function () {
                        u();
                    }), t(p).on('keydown', function (e) {
                        e.keyCode === r.left && l(e, i.lang.dir === 'ltr' ? -1 : 1), e.keyCode === r.right && l(e, i.lang.dir === 'ltr' ? 1 : -1), e.keyCode === r.escape && (e.stopPropagation(), u());
                    }), y.on('click', function (e) {
                        l(e, -1);
                    }), w.on('click', function (e) {
                        l(e, 1);
                    }), a();
                }
                function u(e, t, n) {
                    var i = document.createElement(e);
                    return !!i.canPlayType && '' !== i.canPlayType(t[n]);
                }
                function c(e) {
                    return u('audio', {
                        flac: 'audio/flac',
                        mp3: 'audio/mpeg',
                        ogg: 'audio/ogg',
                        opus: 'audio/ogg; codecs="opus',
                        wav: 'audio/wav',
                        weba: 'audio/webm'
                    }, e);
                }
                function d(e) {
                    return u('video', {
                        mp4: 'video/mp4',
                        ogv: 'video/ogg',
                        webm: 'video/webm'
                    }, e);
                }
                var f = 'calc(100% - 6em)', h = 'calc(100% - 2em)', g = 'position:absolute;' + 'top:0;' + 'left:0;' + 'bottom:0;' + 'right:0;' + 'margin:auto;' + 'max-width:' + f + ';' + 'max-height:' + h + ';', p = g + 'width:' + f + ';height:' + h + ';', v = '<style>' + '.ckf-file-preview-root :focus,.ckf-file-preview-root:focus .ckf-file-preview {' + '-webkit-box-shadow:inset 0 0 0 2px #ffcd32 !important;' + '-moz-box-shadow:inset 0 0 0 2px #ffcd32 !important;' + 'box-shadow:inset 0 0 0 2px #ffcd32 !important;' + '}' + '</style>', m = '<img alt="{{! it.fileName }}" src="{{= it.fileIcon() }}" style="' + g + '">' + '<img alt={{! it.fileName }}" src="{{= it.url }}" id="ckf-image-preview" style="display:none;' + g + '">', w = '<audio src="{{= it.url }}" controls="controls" style="' + g + '">', y = '<video src="{{= it.url }}" controls="controls" style="' + g + '">', C = '<iframe src="{{= it.url }}" style="' + p + '">', b = '<img alt="{{= it.fileName }}" src="{{= it.fileIcon() }}" style="' + g + '">' + '<iframe src="{{= it.url }}" style="display:none;' + p + '">', x = '<img alt="{{= it.fileName }}" src="{{= it.fileIcon() }}" style="' + g + '">';
                return a;
            }), CKFinder.define('CKFinder/Modules/Files/FilesFilter', ['backbone'], function (e) {
                'use strict';
                return {
                    attachTo: function (t) {
                        var n = new e.Collection();
                        return n.search = function (e) {
                            var i;
                            t.length && ('' === e ? (i = t.toArray(), n.isFiltered = !1, n.filter = e) : (i = t.filter(function (t) {
                                return new RegExp(e.replace(/[\\^$*+?.()|[\]{}-]/g, '\\$&'), 'gi').test(t.get('name'));
                            }), n.isFiltered = !0), n.reset(i));
                        }, n.listenTo(t, 'reset', function () {
                            n.reset(t.toArray()), n.isFiltered = !1;
                        }), n.listenTo(t, 'remove', function (e) {
                            n.remove(e);
                        }), n.listenTo(t, 'add', function (e) {
                            n.add(e);
                        }), n.isFiltered = !1, n.comparators = {}, n.sortFiledName = void 0, n.sortAscending = !0, n.on('change:name', function () {
                            n.sortFiledName === 'name' && n.sort();
                        }), n.comparator = function (e, t) {
                            if (!this.sortFiledName || !this.comparators[this.sortFiledName])
                                return 1;
                            if (e.get('view:isFolder') === t.get('view:isFolder')) {
                                if (e.get('view:isFolder') === !1) {
                                    var n = this.comparators[this.sortFiledName], i = n(e, t);
                                    return 0 === i ? i : this.isSortAscending ? i : -i;
                                }
                                return e.get('name').localeCompare(t.get('name'));
                            }
                            return e.get('view:isFolder') ? -1 : 1;
                        }, n.addComparator = function (e, t) {
                            this.comparators[e] = t;
                        }, n.sortByField = function (e) {
                            this.sortFiledName = e, this.sort();
                        }, n.sortAscending = function () {
                            this.isSortAscending = !0, this.sort();
                        }, n.sortDescending = function () {
                            this.isSortAscending = !1, this.sort();
                        }, n.addComparator('name', function (e, t) {
                            return e.get('name').localeCompare(t.get('name'));
                        }), n.addComparator('size', function (e, t) {
                            var n = e.get('size'), i = t.get('size');
                            return n === i ? 0 : n > i ? 1 : -1;
                        }), n.addComparator('date', function (e, t) {
                            return e.get('date').localeCompare(t.get('date'));
                        }), n;
                    }
                };
            }), CKFinder.define('text!CKFinder/Templates/Files/ChooseResizedImageItem.dot', [], function () {
                return '<label>\n\t{{= it.label }}\n\t<span class="ckf-choose-resized-image-size">{{= it.size }}</span>\n\t<input type="radio" name="ckfChooseResized" tabindex="1" value="{{= it.name }}"\n\t    {{? !it.isActive }}disabled="disabled"{{?}}{{? it.isDefault }} checked="checked"{{?}} data-iconpos="{{? it.lang.dir === "ltr"}}left{{??}}right{{?}}">\n</label>\n';
            }), CKFinder.define('text!CKFinder/Templates/Files/ChooseResizedImageInputItem.dot', [], function () {
                return '<label>\n\t{{= it.lang.chooseResizedImage.sizes.custom }}\n\t<input type="radio" name="ckfChooseResized" tabindex="1" value="{{= it.name }}">\n</label>\n<div class="ckf-choose-resized-image-custom-fields ui-state-disabled">\n\t<div class="ckf-choose-resized-image-custom-block">\n\t\t<label class="ckf-choose-resized-image-label">Width</label>\n\t</div>\n\t<div class="ckf-choose-resized-image-custom-block ckf-choose-resized-image-input">\n\t\t<input type="text" name="ckfCustomWidth" tabindex="1" disabled="disabled" value="{{= it.width }}">\n\t</div>\n\t<div class="ckf-choose-resized-image-custom-block">\n\t\t<label class="ckf-choose-resized-image-label">Height</label>\n\t</div>\n\t<div class="ckf-choose-resized-image-custom-block ckf-choose-resized-image-input">\n\t\t<input type="text" name="ckfCustomHeight" tabindex="1" disabled="disabled" value="{{= it.height }}">\n\t</div>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/ChooseResizedImageView', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/Files/ChooseResizedImageItem.dot',
                'text!CKFinder/Templates/Files/ChooseResizedImageInputItem.dot'
            ], function (e, t, n, i, r, o, s) {
                'use strict';
                var a = i.extend({
                    name: 'ContextMenu',
                    template: '',
                    tagName: 'form',
                    events: {
                        'change [name="ckfChooseResized"]': function (e) {
                            var n = t(e.currentTarget).val();
                            n === '__custom' ? (this.$el.find('.ckf-choose-resized-image-custom-fields').removeClass('ui-state-disabled'), this.$el.find('.ckf-choose-resized-image-input input').textinput('enable').removeAttr('disabled').first().focus()) : (this.$el.find('.ckf-choose-resized-image-custom-fields').addClass('ui-state-disabled'), this.$el.find('.ckf-choose-resized-image-input input').textinput('disable').attr('disabled', 'disabled'));
                        }
                    },
                    childEvents: {
                        keydown: function (e, t) {
                            if (t.evt.keyCode === n.down || t.evt.keyCode === n.up || t.evt.keyCode === n.tab) {
                                if (t.evt.preventDefault(), t.evt.stopPropagation(), t.evt.keyCode === n.down || t.evt.keyCode === n.up) {
                                    var i = this.collection.where({ isActive: !0 }), r = i.indexOf(e.model), o = r + (t.evt.keyCode === n.down ? 1 : -1);
                                    o < 0 && (o = i.length - 1), o > i.length - 1 && (o = 0);
                                    var s = this.children.findByModel(i[o]);
                                    s && s.focus();
                                }
                                t.evt.keyCode === n.tab && e.$el.closest('.ckf-dialog').find('[data-ckf-button]').eq(this.finder.util.isShortcut(t.evt, 'shift') ? -1 : 0).focus();
                            }
                        }
                    },
                    collectionEvents: {
                        reset: function () {
                            this.$el.html('');
                        }
                    },
                    onRender: function () {
                        var e = this;
                        setTimeout(function () {
                            e.$el.enhanceWithin();
                        }, 0);
                    },
                    getChildView: function (e) {
                        var t = {
                            name: 'ChooseResizedItem',
                            finder: this.finder,
                            template: o,
                            tagName: 'div',
                            events: {
                                'keydown input[type="radio"]': function (e) {
                                    this.trigger('keydown', { evt: e });
                                }
                            },
                            focus: function () {
                                this.$el.find('input').focus();
                            }
                        };
                        return e.get('custom') && this.addCustomSizeViewConfig(t), r.extend(t);
                    },
                    addCustomSizeViewConfig: function (e) {
                        e.name = 'ChooseResizedCustomItem', e.className = 'ckf-choose-resized-image-custom', e.template = s, e.tagName = 'div', e.ui = {
                            width: 'input[name="ckfCustomWidth"]',
                            height: 'input[name="ckfCustomHeight"]'
                        }, e.setSize = function (e, t) {
                            var n = e <= 0 ? 1 : e, i = t <= 0 ? 1 : t;
                            this.ui.height.val(n), this.ui.width.val(i), this.model.set({ size: i + 'x' + n });
                        }, e.events['input @ui.width'] = function () {
                            var e = this.model.get('width'), t = this.model.get('height'), n = t, i = this.ui.width.val();
                            i.length || (i = 1);
                            var r = parseInt(i);
                            r < e ? n = r * (t / e) : r = e, n = Math.round(n), this.setSize(n, r);
                        }, e.events['input @ui.height'] = function () {
                            var e = this.model.get('width'), t = this.model.get('height'), n = e, i = this.ui.height.val(), r = parseInt(i);
                            i.length || (r = 1), r < t ? n = r * (e / t) : r = t, n = Math.round(n), this.setSize(r, n);
                        };
                    },
                    getSelected: function () {
                        return this.collection.findWhere({ name: this.$el.find('input[name="ckfChooseResized"]:checked').val() });
                    }
                });
                return a;
            }), CKFinder.define('CKFinder/Modules/Files/ChooseFiles', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Modules/Files/Views/ChooseResizedImageView'
            ], function (e, t, n, i) {
                'use strict';
                function r(e) {
                    this.finder = e, this.isEnabled = e.config.chooseFiles, e.config.ckeditor && (e.on('files:choose', function (t) {
                        var n = t.data.files.pop();
                        e.request('file:getUrl', { file: n }).then(function () {
                            var t = {
                                fileUrl: n.getUrl(),
                                fileSize: n.get('size'),
                                fileDate: n.get('date')
                            };
                            e.config.ckeditor.callback(t.fileUrl, t);
                        });
                    }), e.on('file:choose:resizedImage', function (t) {
                        var n = t.data.file, i = {
                                fileUrl: t.data.resizedUrl,
                                fileSize: 0,
                                fileDate: n.get('date')
                            };
                        e.config.ckeditor.callback(t.data.resizedUrl, i);
                    })), this.isEnabled && (e.on('contextMenu:file', function (e) {
                        e.data.groups.add({ name: 'choose' });
                    }, null, null, 10), e.on('contextMenu:file:choose', o), e.on('toolbar:reset:Main:file', s), e.on('toolbar:reset:Main:files', a), e.on('command:ok:SaveImage', function (e) {
                        e.data.context.file.set('imageResizeData', new n.Model());
                    }), e.setHandlers({
                        'image:getResized': {
                            callback: c,
                            context: this
                        },
                        'image:resize': {
                            callback: d,
                            context: this
                        },
                        'image:getResizedUrl': {
                            callback: g,
                            context: this
                        },
                        'files:choose': {
                            context: this,
                            callback: function (t) {
                                l(e, t.files);
                            }
                        },
                        'internal:file:choose': {
                            context: this,
                            callback: function (t) {
                                w(e, t.file);
                            }
                        }
                    })), e.setHandlers({
                        'file:getUrl': {
                            callback: h,
                            context: this
                        },
                        'file:getProxyUrl': {
                            callback: f,
                            context: this
                        }
                    }), e.on('command:after:GetFileUrl', function (e) {
                        e.data.context.thumbnail || e.data.context.file.set('url', e.data.response.url), e.data.context.dfd.resolve(e.data.response.url);
                    }), e.on('dialog:ChooseResizedImage:ok', function (t) {
                        var n = t.data.view.getSelected();
                        m(e, n.get('name'), n.get('size'), t.data.context.file), e.request('dialog:destroy');
                    });
                }
                function o(e) {
                    function t() {
                        new n.Model({
                            name: 'ChooseResizedImage',
                            label: e.finder.lang.chooseResizedImage.title,
                            isActive: i.get('folder').get('acl').imageResize || C(i),
                            icon: 'ckf-choose-resized',
                            action: function () {
                                u(e.finder, i);
                            }
                        }).set('active', C(i));
                    }
                    var i = e.data.context.file;
                    if (e.data.items.add({
                            name: 'Choose',
                            label: e.finder.lang.common.choose,
                            isActive: i.get('folder').get('acl').fileView,
                            icon: 'ckf-choose',
                            action: function () {
                                var t = e.finder.request('files:getSelected');
                                t.length > 1 ? l(e.finder, t) : w(e.finder, i);
                            }
                        }), i.isImage() && e.finder.config.resizeImages) {
                        var r = i.has('imageResizeData') && i.get('imageResizeData').has('originalSize');
                        r || i.once('change:imageResizeData', t), e.data.items.add(new n.Model({
                            name: 'ChooseResizedImage',
                            label: e.finder.lang.chooseResizedImage.title,
                            isActive: i.get('folder').get('acl').imageResize || C(i),
                            icon: 'ckf-choose-resized',
                            action: function () {
                                u(e.finder, i);
                            }
                        }));
                    }
                }
                function s(e) {
                    function t() {
                        w(e.finder, i);
                    }
                    var i = e.data.file;
                    if (y(e, t), i.isImage() && e.finder.config.resizeImages) {
                        var r = i.has('imageResizeData') && i.get('imageResizeData').has('originalSize'), o = new n.Model({
                                name: 'ChooseResizedImage',
                                type: 'button',
                                priority: F,
                                alignment: 'primary',
                                icon: 'ckf-choose-resized',
                                label: e.finder.lang.chooseResizedImage.title,
                                isDisabled: !(i.get('folder').get('acl').imageResize || C(i)),
                                action: function () {
                                    u(e.finder, i);
                                }
                            });
                        r || (i.once('change:imageResizeData', function () {
                            o.set('isDisabled', !C(i));
                        }), e.finder.request('image:getResized', { file: i })), e.data.toolbar.push(o);
                    }
                }
                function a(e) {
                    function t() {
                        l(e.finder, e.finder.request('files:getSelected'));
                    }
                    y(e, t);
                }
                function l(e, t) {
                    var n = t.clone();
                    n.forEach(function (t) {
                        !t.getUrl() && t.get('folder').getResourceType().get('useProxyCommand') && t.set('url', e.request('file:getProxyUrl', { file: t }));
                    }), e.fire('files:choose', { files: n }, e), x(e);
                }
                function u(e, t) {
                    var r = new n.Collection(), o = e.config.initConfigInfo.images;
                    p(r, e, t, o), t.on('change:imageResizeData', function () {
                        r.reset(), p(r, e, t, o);
                    }), e.request('dialog', {
                        title: e.lang.chooseResizedImage.title,
                        name: 'ChooseResizedImage',
                        buttons: [
                            'ok',
                            'cancel'
                        ],
                        view: new i({
                            finder: e,
                            collection: r
                        }),
                        context: { file: t }
                    });
                }
                function c(i) {
                    var r = this.finder, o = i.file, s = new t.Deferred();
                    if (o.has('imageResizeData') && o.get('imageResizeData').has('originalSize'))
                        s.resolve(o);
                    else {
                        var a = o.get('folder');
                        r.once('command:after:GetResizedImages', function (t) {
                            var i = t.data.context.file, r = new n.Model();
                            t.data.response.resized && r.set('resized', t.data.response.resized), t.data.response.originalSize && r.set('originalSize', t.data.response.originalSize), e.forEach(t.data.response.resized, function (t, n) {
                                if (n === _)
                                    return void e.forEach(t, function (e) {
                                        var t = e.name ? e.name : e, i = t.match(T);
                                        if (i) {
                                            var o = { fileName: t };
                                            e.url && (o.url = e.url), r.set(b(n, i[1]), o, { silent: !0 });
                                        }
                                    });
                                var i = { fileName: t.name ? t.name : t };
                                t.url && (i.url = t.url), r.set(b(n), i, { silent: !0 });
                            }), i.set('imageResizeData', r), t.data.context.dfd.resolve(i);
                        });
                        var l = { fileName: o.get('name') };
                        e.isArray(r.config.resizeImages) && r.config.resizeImages.length && (l.sizes = r.config.resizeImages.join(',')), r.request('command:send', {
                            name: 'GetResizedImages',
                            folder: a,
                            params: l,
                            context: {
                                dfd: s,
                                file: o
                            }
                        });
                    }
                    return s.promise();
                }
                function d(e) {
                    var i = this.finder, r = e.file, o = new t.Deferred(), s = e.size;
                    if (!e.name)
                        throw 'The data.name parameter is required';
                    if (e.name === _) {
                        if (!e.size)
                            throw 'The data.size parameter is required when using "{name}".'.replace('{name}', _);
                        s = e.size;
                    } else {
                        if (!i.config.initConfigInfo.images.sizes[e.name])
                            throw 'The name "{name}" is not configured for resized images'.replace('{name}', e.name);
                        s = i.config.initConfigInfo.images.sizes[e.name];
                    }
                    if (r.has('imageResizeData') && r.get('imageResizeData').has('resizedUrl' + s))
                        o.resolve(r);
                    else {
                        var a = r.get('folder');
                        i.once('command:after:ImageResize', function (t) {
                            var i = t.data.context.file, r = t.data.response.url, o = i.get('imageResizeData');
                            if (o || (o = new n.Model(), i.set('imageResizeData', o)), e.save) {
                                var s = o.get('resized');
                                s || (s = {}, o.set('resized', s)), s.__custom || (s.__custom = []), s.__custom.push(r.match(I)[0]);
                            }
                            o.set(b(e.name, e.size), { url: r }), t.data.context.dfd.resolve(i);
                        }), i.request('command:send', {
                            name: 'ImageResize',
                            folder: a,
                            type: 'post',
                            params: {
                                fileName: r.get('name'),
                                size: s
                            },
                            context: {
                                dfd: o,
                                file: r
                            }
                        });
                    }
                    return o.promise();
                }
                function f(t) {
                    var n = this.finder, i = t.file, r = e.extend({ fileName: i.get('name') }, t.params);
                    return t.cache ? r.cache = t.cache : n.config.initConfigInfo.proxyCache && (r.cache = n.config.initConfigInfo.proxyCache), n.request('command:url', {
                        command: 'Proxy',
                        params: r,
                        folder: i.get('folder')
                    });
                }
                function h(e) {
                    var n = this.finder, i = e.file, r = new t.Deferred(), o = i.getUrl();
                    return i.get('folder').getResourceType().get('useProxyCommand') && (o = n.request('file:getProxyUrl', e)), o ? r.resolve(o) : n.request('command:send', {
                        name: 'GetFileUrl',
                        folder: i.get('folder'),
                        params: { fileName: i.get('name') },
                        context: {
                            dfd: r,
                            file: i
                        }
                    }), r.promise();
                }
                function g(e) {
                    var n = this.finder, i = e.file, r = new t.Deferred();
                    return n.request('command:send', {
                        name: 'GetFileUrl',
                        folder: i.get('folder'),
                        params: {
                            fileName: i.get('name'),
                            thumbnail: e.thumbnail
                        },
                        context: {
                            dfd: r,
                            file: i,
                            thumbnail: e.thumbnail
                        }
                    }), r.promise();
                }
                function p(t, n, i, r) {
                    var o = i.get('imageResizeData'), s = o && o.get('originalSize') || '', a = i.get('folder').get('acl').imageResize, l = i.get('folder').get('acl').imageResizeCustom, u = t.add({
                            label: n.lang.chooseResizedImage.originalSize,
                            size: s,
                            name: 'original',
                            isActive: !0,
                            isDefault: !1
                        }), c = o && o.get('resized'), d = !0;
                    if (e.forEach(r.sizes, function (i, r) {
                            var o = i, l = a;
                            if (!e.isArray(n.config.resizeImages) || !n.config.resizeImages.length || e.contains(n.config.resizeImages, r)) {
                                if (c && c[r]) {
                                    var u = c[r].match(T);
                                    2 === u.length && (o = u[1]), l = !0;
                                } else if (s) {
                                    var f = s.split('x'), S = i.split('x'), h = parseInt(S[0]), g = parseInt(S[1]), p = parseInt(f[0]), m = parseInt(f[1]), w = v(h, g, p, m);
                                    p <= w.width && m <= w.height ? l = !1 : o = w.width + 'x' + w.height;
                                }
                                t.add({
                                    label: n.lang.chooseResizedImage.sizes[r] ? n.lang.chooseResizedImage.sizes[r] : r,
                                    size: o,
                                    name: r,
                                    isActive: l,
                                    isDefault: d && l
                                }), d = !1;
                            }
                        }), c && c.__custom) {
                        var f = [];
                        e.forEach(c.__custom, function (e) {
                            var t = e.match(T);
                            t && (t = t[1], f.push({
                                label: t,
                                size: t,
                                width: parseInt(t.split('x')[0]),
                                name: _ + '_' + t,
                                url: e,
                                isActive: !0
                            }));
                        }), e.chain(f).sortBy('width').forEach(function (e) {
                            t.add(e);
                        });
                    }
                    if (l) {
                        var h = 0, g = 0;
                        if (s) {
                            var p = s.split('x');
                            h = p[0], g = p[1];
                        }
                        t.add({
                            name: _,
                            custom: !0,
                            isActive: l,
                            isDefault: !1,
                            width: h,
                            height: g,
                            size: h + 'x' + g
                        });
                    }
                    t.findWhere({ isDefault: !0 }) || u.set('isDefault', !0);
                }
                function v(e, t, n, i) {
                    var r = {
                            width: e,
                            height: t
                        }, o = e / n, s = t / i;
                    return 1 === o && 1 === s || (o < s ? r.height = parseInt(Math.round(i * o)) : o > s && (r.width = parseInt(Math.round(n * s)))), r.height <= 0 && (r.height = 1), r.width <= 0 && (r.width = 1), r;
                }
                function m(e, t, n, i, r) {
                    function o(t, n) {
                        e.request('loader:hide'), e.fire('file:choose:resizedImage', {
                            file: t,
                            resizedUrl: n
                        }, e), x(e);
                    }
                    if (t === 'original')
                        return void w(e, i);
                    0 === t.indexOf(_ + '_') && (t = _);
                    var s = i.get('imageResizeData'), a = b(t, n);
                    if (s && s.has(a)) {
                        var l = s.get(a), u = { file: i };
                        if (l.url)
                            return void o(i, l.url);
                        var c = 'file:getUrl';
                        return t !== 'original' && l.fileName && (c = 'image:getResizedUrl', u.thumbnail = l.fileName), E(e), void e.request(c, u).then(function (e) {
                            o(i, e);
                        });
                    }
                    E(e), e.request('image:resize', {
                        file: i,
                        size: n,
                        name: t,
                        save: r
                    }).then(function (e) {
                        o(e, e.get('imageResizeData').get(a).url);
                    });
                }
                function w(e, t) {
                    var i = t.getUrl(), r = new n.Collection([t]);
                    return i ? void l(e, r) : (E(e), void e.request('file:getUrl', { file: t }).then(function () {
                        e.request('loader:hide'), l(e, r);
                    }));
                }
                function y(e, t) {
                    e.data.toolbar.push({
                        name: 'Choose',
                        type: 'button',
                        priority: M,
                        icon: 'ckf-choose',
                        label: e.finder.lang.common.choose,
                        action: t
                    });
                }
                function C(t) {
                    var n = t.get('folder').get('acl'), i = t.has('imageResizeData') && !!e.size(t.get('imageResizeData').get('resized'));
                    return n.imageResize || n.imageResizeCustom || i;
                }
                function b(e, t) {
                    var n;
                    return n = e === _ ? 'resizedUrl_custom' + t : 'resizedUrl_' + e;
                }
                function x(e) {
                    e.config.chooseFilesClosePopup && e.request('closePopup');
                }
                function E(e) {
                    e.request('loader:show', { text: e.lang.files.gettingFileData + ' ' + e.lang.common.pleaseWait });
                }
                var _ = '__custom', F = 100, M = 110, T = '([0-9]+x[0-9]+)[.][a-zA-Z]{1,5}$', I = '/([^/]+$)';
                return r;
            }), CKFinder.define('CKFinder/Views/Base/Instant/CollectionView', [
                'underscore',
                'jquery',
                'marionette',
                'CKFinder/Views/Base/Common'
            ], function (e, t, n, i) {
                'use strict';
                var r = n.CollectionView, o = r.extend(i.proto), s = o.extend({
                        constructor: function (e) {
                            i.util.construct.call(this, e), r.prototype.constructor.apply(this, Array.prototype.slice.call(arguments));
                        },
                        _renderChildren: function () {
                            this.destroyEmptyView(), this.attachCollectionHTML(''), this.isEmpty(this.collection) ? this.showEmptyView() : (this.triggerMethod('before:render:collection', this), this._showInstantCollection(), this.triggerMethod('render:collection', this), this.children.isEmpty() && this.getOption('filter') && this.showEmptyView());
                        },
                        _onCollectionAdd: function (e, n) {
                            var i = n.indexOf(e), r = this.getChildViews(), o = t(this.instantRenderChild(e));
                            this.destroyEmptyView(), i >= r.length ? this.$el.append(o) : o.insertBefore(r.eq(i)), this.triggerMethod('childview:render');
                        },
                        _onCollectionRemove: function (e) {
                            var t = this.getChildViewElement(e).remove();
                            this.removeChildView(t), this.checkEmpty();
                        },
                        _sortViews: function () {
                            var t = this._filteredSortedModels(), n = e.find(t, function (e, t) {
                                    var n = this.getChildViewElement(e);
                                    if (n.length) {
                                        var i = this.getChildViews().index(n);
                                        return i !== t;
                                    }
                                }, this);
                            n && this.resortView();
                        },
                        _showInstantCollection: function () {
                            var t = this._filteredSortedModels(), i = [], r = this.getOption('childViewOptions');
                            r = n._getValue(r, this, [
                                void 0,
                                0
                            ]), e.each(t, function (e, t) {
                                i.push(this.getPreRenderer(e).preRender(e, r, t));
                            }, this), this.attachCollectionHTML(i.join(''));
                        },
                        buildChildView: function (t, i, r) {
                            var o = e.extend({
                                    model: t,
                                    finder: this.finder
                                }, r), s = new i(o);
                            return n.MonitorDOMRefresh(s), s;
                        },
                        getChildViewElement: function (e) {
                            return this.$(document.getElementById(e.cid));
                        },
                        attachCollectionHTML: function (e) {
                            this.el.innerHTML = e;
                        },
                        getPreRenderer: function () {
                            throw 'Not implemented';
                        },
                        getChildViews: function () {
                            throw 'Not implemented';
                        },
                        instantRenderChild: function () {
                            throw 'Not implemented';
                        }
                    });
                return s;
            }), CKFinder.define('CKFinder/Modules/Files/Views/Common/FilesViewMixin', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n) {
                'use strict';
                function i(e) {
                    return 'childview:' + (e.get('view:isFolder') ? 'folder' : 'file') + ':';
                }
                var r = 700, o = 500, s = {
                        getMethods: function () {
                            return {
                                shouldFocusFirstChild: function () {
                                    if (this.el === document.activeElement && this.collection.length) {
                                        var e = this.collection.first();
                                        return e.trigger('focus', e), !0;
                                    }
                                    return !1;
                                },
                                getEmptyViewData: function () {
                                    var e, t = !1;
                                    if (this.collection.isLoading) {
                                        var n = this.finder.lang.files.loadingFilesPane;
                                        e = {
                                            title: this.finder.lang.common.pleaseWait + ' ' + n.title,
                                            text: n.text
                                        }, t = !0;
                                    } else
                                        e = this.collection.isFiltered ? this.finder.lang.files.filterFilesEmpty : this.finder.lang.files.emptyFilesPane;
                                    return {
                                        title: e.title,
                                        text: e.text,
                                        displayLoader: t
                                    };
                                },
                                updateHeightForBorders: function (e) {
                                    var t = parseInt(getComputedStyle(this.el).getPropertyValue('padding-top')), n = parseInt(getComputedStyle(this.el).getPropertyValue('padding-bottom')), i = parseInt(getComputedStyle(this.el).getPropertyValue('border-top-width')), r = parseInt(getComputedStyle(this.el).getPropertyValue('border-bottom-width')), o = e.height - t - n - i - r;
                                    return this.$el.css({ 'min-height': o }), o;
                                },
                                checkDoubleTap: function (e) {
                                    var n = e.currentTarget.id, r = t(e.currentTarget), s = r.data('ckf-in-touch-at'), a = e.timeStamp;
                                    r.data('ckf-in-touch-at', a);
                                    var l = s && a - s < o, u = this.collection.get(n);
                                    this.trigger(i(u) + (l ? 'dbltap' : 'touch'), {
                                        evt: e,
                                        model: u
                                    });
                                }
                            };
                        },
                        attachModelEvents: function (t, n) {
                            var i = {
                                focus: function (e) {
                                    this.getChildViewElement(e).find('.ui-btn').focus(), this.trigger('file:focused', e);
                                },
                                refresh: function (e) {
                                    this.refreshView(e);
                                },
                                selected: function (e) {
                                    this.getChildViewElement(e).find('.ui-btn').addClass('ui-btn-active');
                                },
                                deselected: function (e) {
                                    this.getChildViewElement(e).find('.ui-btn').removeClass('ui-btn-active');
                                },
                                change: function (e) {
                                    e.changed.name && this.refreshView(e);
                                }
                            };
                            e.each(i, function (e, i) {
                                n.listenTo(t, i, e);
                            });
                        },
                        getEvents: function (o) {
                            var s = {
                                    keydown: function (e) {
                                        if (e.keyCode === n.tab && (this.finder.util.isShortcut(e, '') || this.finder.util.isShortcut(e, 'shift')))
                                            return void this.finder.request(this.finder.util.isShortcut(e, '') ? 'focus:next' : 'focus:prev', {
                                                node: this.$el,
                                                event: e
                                            });
                                        if (e.target === this.el || e.target === this.$el.find('.ckf-files-view').get(0))
                                            return void this.trigger('keydown', { evt: e });
                                        if (e.target !== e.currentTarget) {
                                            var r = t(e.target).closest(o), s = r.get(0).id, a = this.collection.get(s);
                                            if (e.keyCode === n.menu || e.keyCode === n.f10 && this.finder.util.isShortcut(e, 'shift'))
                                                return void this.trigger(i(a) + 'contextmenu', {
                                                    el: r,
                                                    evt: e,
                                                    model: a
                                                });
                                            this.trigger(i(a) + 'keydown', {
                                                evt: e,
                                                model: a,
                                                el: r
                                            });
                                        }
                                    },
                                    focus: function (e) {
                                        setTimeout(function () {
                                            (window.scrollY || window.pageYOffset) && window.scrollTo(0, 0);
                                        }, 20), e.target === e.currentTarget && this.collection.length && (e.preventDefault(), e.stopPropagation(), this.trigger('focused'));
                                    }
                                }, a = {
                                    touchstart: function (e) {
                                        var n = e.currentTarget.id, o = t(e.currentTarget);
                                        o.data('ckf-in-touch', !0);
                                        var s = o.data('ckf-in-touch-timeout');
                                        s && clearTimeout(s);
                                        var a = this;
                                        s = setTimeout(function () {
                                            if (o.data('ckf-in-touch')) {
                                                var t = a.collection.get(n);
                                                if (!t)
                                                    return;
                                                a.trigger(i(t) + 'longtouch', {
                                                    evt: e,
                                                    model: t
                                                }), o.data('ckf-in-touch', !1);
                                            }
                                            o.data('ckf-in-touch-timeout', void 0);
                                        }, r), o.data('ckf-in-touch-timeout', s);
                                    },
                                    touchend: function (e) {
                                        var n = e.currentTarget.id, r = t(e.currentTarget);
                                        if (this.checkDoubleTap(e), r.data('ckf-in-touch')) {
                                            var o = this.collection.get(n);
                                            if (!o)
                                                return;
                                            this.trigger(i(o) + 'click', {
                                                evt: e,
                                                model: o
                                            });
                                        }
                                        r.data('ckf-in-touch', !1);
                                    },
                                    touchcancel: function (e) {
                                        t(e.currentTarget).data('ckf-in-touch', !1);
                                    },
                                    touchmove: function (e) {
                                        t(e.currentTarget).data('ckf-in-touch', !1);
                                    },
                                    contextmenu: function (e) {
                                        var n = e.currentTarget.id, r = this.collection.get(n), o = t(e.currentTarget);
                                        o.data('ckf-in-touch') ? e.preventDefault() : this.trigger(i(r) + 'contextmenu', {
                                            evt: e,
                                            model: r,
                                            el: document.getElementById(n)
                                        });
                                    },
                                    click: function (e) {
                                        var t = e.currentTarget.id, n = this.collection.get(t);
                                        this.trigger(i(n) + 'click', {
                                            evt: e,
                                            model: n,
                                            el: document.getElementById(t)
                                        });
                                    },
                                    dblclick: function (e) {
                                        var t = this.collection.get(e.currentTarget.id);
                                        this.trigger(i(t) + 'dblclick', {
                                            evt: e,
                                            model: t
                                        });
                                    },
                                    dragstart: function (e) {
                                        var t = this.collection.get(e.currentTarget.id);
                                        this.trigger(i(t) + 'dragstart', {
                                            evt: e,
                                            model: t
                                        });
                                    },
                                    dragend: function (e) {
                                        function t(e) {
                                            e.cancel();
                                        }
                                        var n = this, r = n.collection.get(e.currentTarget.id);
                                        n.finder.on('ui:swipeleft', t, null, null, 1), n.finder.on('ui:swiperight', t, null, null, 1), setTimeout(function () {
                                            this.finder.removeListener('ui:swipeleft', t), this.finder.removeListener('ui:swiperight', t);
                                        }, 500), n.trigger(i(r) + 'dragend', {
                                            evt: e,
                                            model: r
                                        });
                                    },
                                    blur: function (e) {
                                        e.target.tabIndex = -1;
                                    },
                                    focus: function (e) {
                                        e.target.tabIndex = 0;
                                    }
                                };
                            return e.forEach(a, function (e, t) {
                                s[t + ' ' + o] = e;
                            }), s;
                        }
                    };
                return s;
            }), CKFinder.define('text!CKFinder/Templates/Files/FilesInfo.dot', [], function () {
                return '{{? it.displayLoader }}\n<div class="ui-loader ui-loader-verbose ui-content ui-body-{{= it.swatch }} ui-corner-all">\n\t<span class="ui-icon-loading"></span>\n\t<h1>{{= it.title }}</h1>\n</div>\n{{??}}\n<div class="ckf-files-info-body ui-content ui-body-{{= it.swatch }} ui-corner-all">\n\t<h2>{{= it.title }}</h2>\n\t{{? it.displayLoader }}<p>{{= it.text }}</p>{{?}}\n</div>\n{{?}}\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/Common/FilesInfoView', [
                'backbone',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/Files/FilesInfo.dot'
            ], function (e, t, n) {
                'use strict';
                var i = t.extend({
                    name: 'FilesInfoView',
                    template: n,
                    className: 'ckf-files-info',
                    templateHelpers: function () {
                        return { swatch: this.finder.config.swatch };
                    },
                    initialize: function () {
                        this.model = new e.Model({
                            title: this.title,
                            text: this.text,
                            displayLoader: this.displayLoader
                        });
                    }
                });
                return i;
            }), CKFinder.define('text!CKFinder/Templates/Files/FileView.dot', [], function () {
                return '<a href="javascript:void(0)" class="ckf-files-inner ui-btn" tabindex="-1" draggable="true" role="listitem" aria-label="{{! it.name }}" aria-describedby="{{! it.descriptionId }}" data-ckf-drag-preview="{{= it.dragPreviewId }}" data-ckf-view="{{= it.cid }}">\n\t<img id="{{= it.dragPreviewId }}" class="ui-li-thumb" alt="" src="{{= it.getIcon() }}" draggable="true" data-ckf-drag-preview="{{= it.dragPreviewId }}"/>\n\t{{? it.displayName || it.displayDate || it.displaySize }}\n\t<div class="ckf-file-desc ui-bar-{{= it.config.swatch}}" draggable="true">\n\t\t{{? it.displayName }}<h2 title="{{! it.name }}" dir="auto">{{! it.name }}</h2>{{?}}\n\t\t<p draggable="true" id="{{! it.descriptionId }}" data-ckf-drag-preview="{{= it.dragPreviewId }}">\n\t\t\t{{? it.displayDate }}{{! it.lang.formatDateString( it.date ) }}{{?}}\n\t\t\t{{? it.displaySize }}\n\t\t\t\t{{? it.displayDate }}<br>{{?}}\n\t\t\t\t{{! it.lang.formatFileSize( it.size * 1024 ) }}\n\t\t\t{{?}}\n\t\t</p>\n\t</div>\n\t{{?}}\n</a>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/ThumbnailsView/FileRenderer', ['text!CKFinder/Templates/Files/FileView.dot'], function (e) {
                'use strict';
                function t(e, t) {
                    this.finder = e, this.renderer = t;
                }
                return t.prototype.preRender = function (t, n) {
                    var i = this.finder, r = {
                            lazyThumb: n.lazyThumb,
                            displayName: n.displayName,
                            displaySize: n.displaySize,
                            displayDate: n.displayDate,
                            descriptionId: 'ckf-file-desc-' + t.cid,
                            dragPreviewId: 'ckf-drag-prev-' + t.cid,
                            getIcon: function () {
                                return i.request('file:getIcon', {
                                    size: n.thumbSize,
                                    file: t
                                });
                            }
                        }, o = '<li id="' + t.cid + '" class="ckf-file-item ui-li-has-thumb' + (t.isImage() ? ' ckf-lazy-thumb' : ' ckf-file-icon') + '"' + (n.mode === 'list' ? '' : ' style="width:' + n.thumbSize + 'px;height:' + n.thumbSize + 'px;"') + ' data-icon="false" role="presentation"' + '>';
                    return o += this.renderer.render(t, 'FileThumb', e, r), o += '</li>';
                }, t;
            }), CKFinder.define('text!CKFinder/Templates/Files/FolderInFile.dot', [], function () {
                return '<a class="ckf-files-inner ui-btn" tabindex="-1" draggable="false" data-ckf-drop="true">\n\t<img class="ui-li-thumb" alt="{{! it.label || it.name }}" src="{{= it.getIcon() }}" data-ckf-drop="true">\n\n\t<div class="ckf-file-desc ui-bar-{{= it.config.swatch }}">\n\t\t<h2 title="{{! it.label || it.name }}" data-ckf-drop="true">{{! it.label || it.name }}</h2>\n\t</div>\n</a>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/ThumbnailsView/FolderRenderer', ['text!CKFinder/Templates/Files/FolderInFile.dot'], function (e) {
                'use strict';
                function t(e, t) {
                    this.finder = e, this.renderer = t;
                }
                return t.prototype.preRender = function (t, n) {
                    var i = this.finder, r = {
                            lazyThumb: n.lazyThumb,
                            displayName: n.displayName,
                            displaySize: n.displaySize,
                            displayDate: n.displayDate,
                            descriptionId: 'ckf-file-desc-' + t.cid,
                            dragPreviewId: 'ckf-drag-prev-' + t.cid,
                            getIcon: function () {
                                return i.request('folder:getIcon', {
                                    size: n.thumbSize,
                                    folder: t
                                });
                            }
                        };
                    return '<li id="' + t.cid + '" class="ckf-file-item ckf-folders-item" data-icon="false" role="presentation"' + (n.mode === 'list' ? '' : ' style="width:' + n.thumbSize + 'px;height:' + n.thumbSize + 'px;"') + '>' + this.renderer.render(t, 'FolderThumb', e, r) + '</li>';
                }, t;
            }), CKFinder.define('CKFinder/Util/Throttlers', [
                'underscore',
                'jquery'
            ], function (e, t) {
                'use strict';
                function n() {
                    this.reset();
                }
                var i = {};
                return n.prototype = {
                    reset: function () {
                        var e = this;
                        e.dfd && e.dfd.reject(), e.dfd = new t.Deferred(), e.dfd.done(function () {
                            e.callback && e.callback(), e.reset();
                        }), e.timeOutId = -1;
                    },
                    assignJob: function (e) {
                        this.callback = e;
                    },
                    runAfter: function (e) {
                        var t = this;
                        t.timeOutId && clearTimeout(t.timeOutId), t.timeOutId = setTimeout(function () {
                            t.dfd.resolve();
                        }, e);
                    }
                }, {
                    getOrCreate: function (t, r) {
                        return e.has(i, t) || (i[t] = new n()), i[t].reset(), i[t].assignJob(r), i[t];
                    }
                };
            }), CKFinder.define('CKFinder/Modules/Files/Views/ThumbnailsView', [
                'underscore',
                'jquery',
                'marionette',
                'CKFinder/Views/Base/Instant/CollectionView',
                'CKFinder/Modules/Files/Views/Common/FilesViewMixin',
                'CKFinder/Modules/Files/Views/Common/FilesInfoView',
                'CKFinder/Modules/Files/Views/ThumbnailsView/FileRenderer',
                'CKFinder/Modules/Files/Views/ThumbnailsView/FolderRenderer',
                'CKFinder/Util/Throttlers'
            ], function (e, t, n, i, r, o, s, a, l) {
                'use strict';
                var u = 1000, c = 400, d = 500, f = {
                        name: 'ThumbnailsView',
                        reorderOnSort: !0,
                        className: 'ckf-files-view ckf-files-view-borders ui-body-inherit',
                        attributes: {
                            'data-role': 'listview',
                            tabindex: 30,
                            role: 'list'
                        },
                        tagName: 'ul',
                        invertKeys: !1,
                        collectionEvents: {
                            change: function (t) {
                                var i = t.changed;
                                if (i.name || i.date || i.size) {
                                    var r = this.getChildViewElement(t), o = this.getOption('childViewOptions');
                                    o = n._getValue(o, this, [
                                        void 0,
                                        0
                                    ]);
                                    var s = e.defaults(o, {
                                        lazyThumb: this.finder.request('file:getThumb', {
                                            file: t,
                                            size: o.thumbSizeString
                                        })
                                    });
                                    r.replaceWith(this.getPreRenderer(t).preRender(t, s)), this.triggerMethod('childview:render');
                                    var a = this.getOption('displayConfig').get('thumbSize');
                                    this.getOption('displayConfig').get('mode') === 'thumbs' && this.resizeThumbs(a);
                                }
                            }
                        },
                        initialize: function (e) {
                            var t = this;
                            if (e.displayConfig.set({
                                    mode: 'list',
                                    thumbSizeString: null,
                                    currentThumbConfigSize: 0,
                                    thumbClassName: ''
                                }), e.mode === 'thumbs') {
                                var n = t.getOption('displayConfig').get('thumbSize');
                                this.calculateThumbSizeConfig(n), this.resizeThumbs(n), this.applyBiggerThumbs(n), t.setThumbsMode();
                            } else
                                t.setListMode();
                            r.attachModelEvents(this.collection, this), t.on('file:focused', function (e) {
                                var t = this;
                                setTimeout(function () {
                                    var n = t.$el.closest('[data-role="page"]'), i = parseInt(t.$el.offset().top), r = t.collection.indexOf(e), o = t.getThumbsInRow();
                                    if (r < o && (window.scrollY || window.pageYOffset) && i)
                                        return void window.scrollTo(0, 0);
                                    var s = t.collection.length % o, a = t.collection.length - (s ? s : o);
                                    r >= a && window.scrollTo(0, n.outerHeight());
                                }, 20);
                            }), t.once('render', function () {
                                t.$el.trigger('create'), t.$el.attr('aria-label', t.finder.lang.files.filesPaneTitle);
                            }), t.once('show', function () {
                                function e(e) {
                                    t.trigger('click', { evt: e });
                                }
                                var n = t.$el.closest('.ckf-page-regions');
                                n.on('click', e), t.once('destroy', function () {
                                    n.off('click', e);
                                });
                            }), t.on('render', function () {
                                var e = t.finder.request('folder:getActive'), n = e && e.cid;
                                t.finder.config.displayFoldersPanel || t.lastFolderCid || t.focus(), t.lastFolderCid = n, t.getOption('displayConfig').get('mode') === 'list' ? t.setListMode() : t.setThumbsMode();
                            }), t.on('maximize', t.updateHeightForBorders, t);
                        },
                        childViewOptions: function () {
                            return this.getOption('displayConfig').toJSON();
                        },
                        applySizeClass: function (t) {
                            var n = this, i = !1;
                            e.forEach(n.finder.config.thumbnailClasses, function (e, r) {
                                !i && t < r ? (n.$el.addClass('ckf-files-thumbs-' + e), i = !0) : n.$el.removeClass('ckf-files-thumbs-' + e);
                            });
                        },
                        calculateThumbSizeConfig: function (t) {
                            if (t && this.getOption('displayConfig').get('areThumbnailsResizable')) {
                                var n = this.getOption('displayConfig').get('serverThumbs'), i = e.filter(n, function (e) {
                                        return e >= t;
                                    }), r = e.isEmpty(i) ? e.max(n) : e.min(i), o = this.getOption('displayConfig').get('thumbnailConfigs')[r];
                                return this.getOption('displayConfig').set('thumbSizeString', o.thumb), this.getOption('displayConfig').set('currentThumbConfigSize', r), o;
                            }
                        },
                        resizeThumbs: function (e) {
                            this.$el.find('.ckf-file-item').css({
                                width: e + 'px',
                                height: e + 'px'
                            });
                            var t = this;
                            setTimeout(function () {
                                t.trigger('sizeUpdate:after');
                            }, c);
                        },
                        applyBiggerThumbs: function (e) {
                            var n = this;
                            if (e && n.getOption('displayConfig').get('mode') === 'thumbs') {
                                e = parseInt(e, 10), this.applySizeClass(e);
                                var i = this.getOption('displayConfig').get('currentThumbConfigSize');
                                if (!i || e > i) {
                                    var r = this.calculateThumbSizeConfig(e);
                                    l.getOrCreate('files:resize', function () {
                                        n.$el.find('li').not('.ckf-file-icon').addClass('ckf-lazy-thumb'), n.$el.find('li.ckf-file-icon').each(function () {
                                            t(this).find('img').attr('src', n.finder.request('file:getIcon', {
                                                size: e,
                                                file: n.collection.get(this.id)
                                            }));
                                        }), n.$el.find('li.ckf-folders-item img').attr('src', n.finder.request('folder:getIcon', { size: e })), n.children.invoke('trigger', 'sizeUpdate', {
                                            thumbSize: e,
                                            thumbSizeString: r.thumb
                                        }), n.trigger('sizeUpdate:after');
                                    }).runAfter(d);
                                } else
                                    setTimeout(function () {
                                        n.trigger('sizeUpdate:after');
                                    }, c);
                            }
                        },
                        setListMode: function () {
                            this.getOption('displayConfig').set('mode', 'list'), this.$el.removeClass('ckf-files-thumbs').addClass('ckf-files-list'), this.$el.find('.ckf-file-item').css({
                                width: 'auto',
                                height: 'auto'
                            });
                        },
                        setThumbsMode: function () {
                            this.getOption('displayConfig').set('mode', 'thumbs'), this.$el.removeClass('ckf-files-list').addClass('ckf-files-thumbs');
                        },
                        getThumbsInRow: function () {
                            if (this.getOption('displayConfig').get('mode') === 'list' || this.collection.length < 2)
                                return 1;
                            var e = this.getChildViewElement(this.collection.first());
                            if (!e.length)
                                return 1;
                            var t, n, i = e.offset().top, r = 1;
                            for (t = 1; t < this.collection.length && (n = this.getChildViewElement(this.collection.at(t)), n.offset().top === i); t++)
                                r += 1;
                            return r;
                        },
                        focus: function () {
                            this.$el.focus();
                        },
                        getEmptyView: function () {
                            var e = this.getEmptyViewData();
                            return o.extend({
                                title: e.title,
                                text: e.text,
                                displayLoader: e.displayLoader,
                                displayInfo: !this.finder.config.readOnly
                            });
                        },
                        getChildViews: function () {
                            return this.$('li');
                        },
                        reorder: function () {
                            var t = this, n = this._filteredSortedModels(), i = e.some(n, function (e) {
                                    return !t.getChildViewElement(e).length;
                                });
                            if (i)
                                this.render();
                            else {
                                var r = e.map(n, function (e) {
                                        return t.getChildViewElement(e);
                                    }), o = this.getChildViews(), s = e.filter(o, function (e) {
                                        return o.index(e) === -1;
                                    });
                                this.triggerMethod('before:reorder'), this._appendReorderedChildren(r), s.length, this.checkEmpty(), this.triggerMethod('reorder');
                            }
                        },
                        instantRenderChild: function (t) {
                            var i = this.getOption('childViewOptions');
                            i = n._getValue(i, this, [
                                void 0,
                                0
                            ]);
                            var r = e.defaults(i, {
                                lazyThumb: this.finder.request('file:getThumb', {
                                    file: t,
                                    size: i.thumbSizeString
                                })
                            });
                            return this.getPreRenderer(t).preRender(t, r);
                        },
                        refreshView: function () {
                        },
                        getPreRenderer: function (e) {
                            return e.get('view:isFolder') ? new a(this.finder, this.finder.renderer) : new s(this.finder, this.finder.renderer);
                        }
                    };
                e.extend(f, r.getMethods()), f.events = e.extend({
                    'mouseenter img': function (e) {
                        var n = t(e.currentTarget).closest('li'), i = setTimeout(function () {
                                n.addClass('ckf-file-show-thumb'), n.data('ckf-description-timeout', void 0);
                            }, u);
                        n.data('ckf-description-timeout', i);
                    },
                    'mouseleave img': function (e) {
                        var n = t(e.currentTarget).closest('li'), i = n.data('ckf-description-timeout');
                        i && (clearTimeout(i), n.data('ckf-description-timeout', void 0)), n.removeClass('ckf-file-show-thumb');
                    }
                }, r.getEvents('li'));
                var h = i.extend(f);
                return h;
            }), CKFinder.define('text!CKFinder/Templates/Files/List/FileIconCell.dot', [], function () {
                return '<img id="{{= it.dragPreviewId }}" class="ui-li-thumb" alt="" src="{{= it.getIcon() }}" draggable="true" data-ckf-drag-preview="{{= it.dragPreviewId }}" />';
            }), CKFinder.define('text!CKFinder/Templates/Files/List/FileNameCell.dot', [], function () {
                return '<a class="ui-btn" href="" tabindex="-1" draggable="true" data-ckf-drag-preview="{{= it.dragPreviewId }}" title="{{! it.name }}">\n\t<span dir="auto" class="ckf-files-inner">{{! it.name }}</span>\n</a>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/ListView/FileRowRenderer', [
                'underscore',
                'text!CKFinder/Templates/Files/List/FileIconCell.dot',
                'text!CKFinder/Templates/Files/List/FileNameCell.dot'
            ], function (e, t, n) {
                'use strict';
                function i(e, t) {
                    this.finder = e, this.renderer = t;
                }
                return i.prototype.preRender = function (i, r) {
                    var o = this.finder, s = this.renderer, a = {
                            lazyThumb: r.lazyThumb,
                            displayName: r.displayName,
                            displaySize: r.displaySize,
                            displayDate: r.displayDate,
                            descriptionId: 'ckf-file-desc-' + i.cid,
                            dragPreviewId: 'ckf-drag-prev-' + i.cid,
                            getIcon: function () {
                                return o.request('file:getIcon', {
                                    size: r.listViewIconSize,
                                    file: i
                                });
                            }
                        }, l = '<tr id="' + i.cid + '" class="ckf-file-item">';
                    return r.collection.forEach(function (r) {
                        var u = r.get('name');
                        if (u === 'icon')
                            return void (l += s.render(i, 'FileIconCellView', '<td>' + t + '</td>', a));
                        if (u === 'name')
                            return void (l += s.render(i, 'FileNameCellView', '<td class="ckf-files-list-view-col-name ui-body-inherit">' + n + '</td>', a));
                        if (u === 'date')
                            return void (l += s.render(i, 'DateCellView', '<td>{{! it.lang.formatDateString( it.date ) }}</td>', a));
                        if (u === 'size')
                            return void (l += s.render(i, 'SizeCellView', '<td>{{! it.lang.formatFileSize( it.size * 1024 ) }}</td>', a));
                        if (u === 'empty')
                            return void (l += s.render(i, 'EmptyCellView', '<td></td>', a));
                        var c = {
                            template: void 0,
                            templateHelpers: void 0
                        };
                        o.fire('listView:file:column:' + u, c), l += c.template && c.template.length ? s.render(i, 'CustomFileCellView-' + u, c.template, e.extend({}, a, c.templateHelpers)) : s.render(i, 'EmptyCellView', '<td></td>', a);
                    }), l += '</tr>';
                }, i;
            }), CKFinder.define('text!CKFinder/Templates/Files/List/FolderNameCell.dot', [], function () {
                return '<a class="ui-btn" href="" tabindex="-1" draggable="false" data-ckf-drop="true" title="{{! it.label || it.name }}">\n\t<span dir="auto" class="ckf-files-inner">{{! it.label || it.name }}</span>\n</a>';
            }), CKFinder.define('CKFinder/Modules/Files/Views/ListView/FolderRowRenderer', [
                'underscore',
                'text!CKFinder/Templates/Files/List/FileIconCell.dot',
                'text!CKFinder/Templates/Files/List/FolderNameCell.dot'
            ], function (e, t, n) {
                'use strict';
                function i(e, t) {
                    this.finder = e, this.renderer = t;
                }
                return i.prototype.preRender = function (i, r) {
                    var o = this.finder, s = this.renderer, a = {
                            lazyThumb: r.lazyThumb,
                            displayName: r.displayName,
                            displaySize: r.displaySize,
                            displayDate: r.displayDate,
                            descriptionId: 'ckf-folder-desc-' + i.cid,
                            dragPreviewId: 'ckf-drag-prev-' + i.cid,
                            getIcon: function () {
                                return o.request('folder:getIcon', { size: r.listViewIconSize });
                            }
                        }, l = '<tr id="' + i.cid + '" class="ckf-folder-item" data-ckf-drop="true">';
                    return r.collection.forEach(function (r) {
                        var u = r.get('name');
                        if (u === 'icon')
                            return void (l += s.render(i, 'FolderIconCellView', '<td>' + t + '</td>', a));
                        if (u === 'name')
                            return void (l += s.render(i, 'FileNameCellView', '<td class="ckf-files-list-view-col-name ui-body-inherit">' + n + '</td>', a));
                        if (u === 'empty' || u === 'size' || u === 'date')
                            return void (l += s.render(i, 'EmptyCellView', '<td></td>', a));
                        var c = {
                            template: void 0,
                            templateHelpers: void 0
                        };
                        o.fire('listView:folder:column:' + u, c), l += c.template && c.template.length ? s.render(i, 'CustomFolderCellView-' + u, c.template, e.extend({}, a, c.templateHelpers)) : s.render(i, 'EmptyCellView', '<td></td>', a);
                    }), l += '</tr>';
                }, i;
            }), CKFinder.define('text!CKFinder/Templates/Files/List/ListView.dot', [], function () {
                return '<table class="ckf-files-view ckf-files-list-view">\n<thead>\n\t<tr>\n\t\t{{~ it.columns.models : column }}\n\t\t\t<th{{? column.get("sort") }} data-ckf-sort="{{= column.get("sort") }}"{{?}}{{? column.get("width") }} style="width:{{= column.get("width") }};"{{?}}>\n\t\t\t\t{{= column.get( "label" ) }}\n\t\t\t\t{{? column.get("sort") === it.sortBy }}\n\t\t\t\t\t<span class="ckf-files-list-view-sorter">{{? it.sortByOrder === \'asc\' }}{{= it.asc }}{{?? it.sortByOrder === \'desc\' }}{{= it.desc }}{{?}}</span>\n\t\t\t\t{{?}}\n\t\t\t</th>\n\t\t{{~}}\n\t</tr>\n</thead>\n<tbody></tbody>\n</table>\n';
            }), CKFinder.define('text!CKFinder/Templates/Files/FilesInfoInListView.dot', [], function () {
                return '<td>\n\t<div class="ckf-files-info">\n\t{{? it.displayLoader }}\n\t<div class="ui-loader ui-loader-verbose ui-content ui-body-{{= it.swatch }} ui-corner-all">\n\t\t<span class="ui-icon-loading"></span>\n\t\t<h1>{{= it.title }}</h1>\n\t</div>\n\t{{??}}\n\t<div class="ckf-files-info-body ui-content ui-body-{{= it.swatch }} ui-corner-all">\n\t\t<h2>{{= it.title }}</h2>\n\t\t{{? it.displayLoader }}<p>{{= it.text }}</p>{{?}}\n\t</div>\n\t{{?}}\n\t</div>\n</td>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/ListView', [
                'underscore',
                'jquery',
                'backbone',
                'marionette',
                'CKFinder/Views/Base/Instant/CollectionView',
                'CKFinder/Modules/Files/Views/Common/FilesViewMixin',
                'CKFinder/Modules/Files/Views/ListView/FileRowRenderer',
                'CKFinder/Modules/Files/Views/ListView/FolderRowRenderer',
                'CKFinder/Modules/Files/Views/Common/FilesInfoView',
                'text!CKFinder/Templates/Files/List/ListView.dot',
                'text!CKFinder/Templates/Files/FilesInfoInListView.dot'
            ], function (e, t, n, i, r, o, s, a, l, u, c) {
                'use strict';
                var d = {
                        name: 'ListView',
                        attributes: { tabindex: 30 },
                        tagName: 'div',
                        className: 'ckf-files-view-borders ui-body-inherit',
                        reorderOnSort: !0,
                        childViewContainer: 'tbody',
                        template: u,
                        invertKeys: !0,
                        initialize: function (e) {
                            this.columns = new n.Collection([], { comparator: 'priority' }), this.model = new n.Model(), o.attachModelEvents(this.collection, this), this.model.set('asc', '&#9650;'), this.model.set('desc', '&#9660;'), this.updateColumns(), this.listenTo(e.displayConfig, 'change:sortBy', this.updateSortIndicator), this.listenTo(e.displayConfig, 'change:sortByOrder', this.updateSortIndicator), this.on('maximize', this.updateHeightForBorders, this);
                        },
                        childViewOptions: function () {
                            var e = this.getOption('displayConfig').toJSON();
                            return e.collection = this.columns, e;
                        },
                        onBeforeRender: function () {
                            this.updateColumns();
                        },
                        isEmpty: function () {
                            var e = !this.collection.length;
                            return this.$el.toggleClass('ckf-files-list-empty', e), e;
                        },
                        getEmptyView: function () {
                            var e = this.getEmptyViewData();
                            return l.extend({
                                title: e.title,
                                text: e.text,
                                displayLoader: e.displayLoader,
                                displayInfo: !this.finder.config.readOnly,
                                template: c,
                                tagName: 'tr',
                                className: ''
                            });
                        },
                        updateColumns: function () {
                            var e = new n.Collection(), t = this.getOption('displayConfig').get('listViewIconSize') - 4 + 'px';
                            e.add({
                                name: 'icon',
                                label: '',
                                priority: 10,
                                width: t
                            }), e.add({
                                name: 'name',
                                label: this.finder.lang.settings.displayName,
                                priority: 20,
                                sort: 'name'
                            }), this.getOption('displayConfig').get('displaySize') && e.add({
                                name: 'size',
                                label: this.finder.lang.settings.displaySize,
                                priority: 30,
                                sort: 'size'
                            }), this.getOption('displayConfig').get('displayDate') && e.add({
                                name: 'date',
                                label: this.finder.lang.settings.displayDate,
                                priority: 40,
                                sort: 'date'
                            }), this.finder.fire('listView:columns', { columns: e }), this.columns.reset(e.toArray()), this.model.set('columns', this.columns), this.model.set('sortBy', this.getOption('displayConfig').get('sortBy')), this.model.set('sortByOrder', this.getOption('displayConfig').get('sortByOrder'));
                        },
                        getThumbsInRow: function () {
                            return 1;
                        },
                        updateSortIndicator: function () {
                            var e = this.getOption('displayConfig').get('sortBy'), t = this.getOption('displayConfig').get('sortByOrder');
                            this.$el.find('th .ckf-files-list-view-sorter').html(t === 'asc' ? this.model.get('asc') : this.model.get('desc')).appendTo(this.$el.find('th[data-ckf-sort="' + e + '"]'));
                        },
                        getPreRenderer: function (e) {
                            return e.get('view:isFolder') ? new a(this.finder, this.finder.renderer) : new s(this.finder, this.finder.renderer);
                        },
                        attachCollectionHTML: function (e) {
                            var t = this.finder.renderer.render(this.model, 'ListView', u, {}), n = t.indexOf('</tbody>');
                            this.el.innerHTML = t.substring(0, n) + e + t.substring(n);
                        },
                        getChildViewElement: function (e) {
                            return this.$(document.getElementById(e.cid));
                        },
                        getChildViews: function () {
                            return this.$('td');
                        },
                        instantRenderChild: function (t) {
                            var n = this.getOption('childViewOptions');
                            n = i._getValue(n, this, [
                                void 0,
                                0
                            ]);
                            var r = e.defaults(n, {
                                lazyThumb: this.finder.request('file:getThumb', {
                                    file: t,
                                    size: n.thumbSizeString
                                })
                            });
                            return this.getPreRenderer(t).preRender(t, r);
                        }
                    }, f = o.getMethods();
                e.extend(d, f), d.events = e.extend({
                    selectstart: function (e) {
                        e.preventDefault(), e.stopPropagation();
                    },
                    'mousedown th[data-ckf-sort]': function (e) {
                        e.stopPropagation(), e.stopImmediatePropagation(), e.preventDefault();
                        var n = t(e.currentTarget).attr('data-ckf-sort'), i = this.getOption('displayConfig').get('sortBy');
                        if (n === i) {
                            var r = this.getOption('displayConfig').get('sortByOrder');
                            this.finder.request('settings:setValue', {
                                group: 'files',
                                name: 'sortByOrder',
                                value: r === 'asc' ? 'desc' : 'asc'
                            });
                        } else
                            this.finder.request('settings:setValue', {
                                group: 'files',
                                name: 'sortBy',
                                value: n
                            });
                    },
                    'dragstart .ckf-folder-item': function (e) {
                        e.preventDefault();
                    },
                    'dragend .ckf-folder-item': function (e) {
                        e.preventDefault();
                    },
                    'ckfdrop .ckf-folder-item': function (e) {
                        e.stopPropagation();
                        var n = this.collection.get(e.currentTarget.id);
                        this.trigger('childview:folder:drop', {
                            evt: e,
                            model: n,
                            el: t(e.target).find('.ckf-files-inner')
                        });
                    }
                }, o.getEvents('tr'));
                var h = r.extend(d);
                return h;
            }), CKFinder.define('text!CKFinder/Templates/Files/Compact/File.dot', [], function () {
                return '<a class="ui-btn" href="javascript:void(0)" tabindex="-1" draggable="true" data-ckf-drag-preview="{{= it.dragPreviewId }}" title="{{! it.name }}" data-ckf-view="{{= it.cid }}">\n    <img id="{{= it.dragPreviewId }}" alt="" src="{{= it.getIcon() }}" draggable="true" data-ckf-drag-preview="{{= it.dragPreviewId }}" />\n\t<span dir="auto" class="">{{! it.name }}</span>\n</a>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/CompactView/FileRenderer', ['text!CKFinder/Templates/Files/Compact/File.dot'], function (e) {
                'use strict';
                function t(e, t) {
                    this.finder = e, this.renderer = t;
                }
                return t.prototype.preRender = function (t, n) {
                    var i = this.finder, r = {
                            lazyThumb: n.lazyThumb,
                            displayName: n.displayName,
                            displaySize: n.displaySize,
                            displayDate: n.displayDate,
                            descriptionId: 'ckf-file-desc-' + t.cid,
                            dragPreviewId: 'ckf-drag-prev-' + t.cid,
                            getIcon: function () {
                                return i.request('file:getIcon', {
                                    size: n.compactViewIconSize,
                                    file: t
                                });
                            }
                        }, o = '<li id="' + t.cid + '" class="ckf-file-item" role="presentation">';
                    return o += this.renderer.render(t, 'CompactFile', e, r), o += '</li>';
                }, t;
            }), CKFinder.define('text!CKFinder/Templates/Files/Compact/Folder.dot', [], function () {
                return '<a class="ui-btn" href="javascript:void(0)" tabindex="-1" draggable="false" title="{{! it.name }}">\n    <img id="{{= it.dragPreviewId }}" alt="" src="{{= it.getIcon() }}" draggable="false" />\n\t<span dir="auto" class="">{{! it.label || it.name }}</span>\n</a>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/CompactView/FolderRenderer', ['text!CKFinder/Templates/Files/Compact/Folder.dot'], function (e) {
                'use strict';
                function t(e, t) {
                    this.finder = e, this.renderer = t;
                }
                return t.prototype.preRender = function (t, n) {
                    var i = this.finder, r = {
                            lazyThumb: n.lazyThumb,
                            displayName: n.displayName,
                            displaySize: n.displaySize,
                            displayDate: n.displayDate,
                            descriptionId: 'ckf-file-desc-' + t.cid,
                            dragPreviewId: 'ckf-drag-prev-' + t.cid,
                            getIcon: function () {
                                return i.request('folder:getIcon', {
                                    size: n.compactViewIconSize,
                                    folder: t
                                });
                            }
                        }, o = '<li id="' + t.cid + '" class="ckf-folder-item" role="presentation">';
                    return o += this.renderer.render(t, 'CompactFolder', e, r), o += '</li>';
                }, t;
            }), CKFinder.define('CKFinder/Modules/Files/Views/CompactView', [
                'underscore',
                'jquery',
                'backbone',
                'marionette',
                'CKFinder/Views/Base/Instant/CollectionView',
                'CKFinder/Modules/Files/Views/Common/FilesViewMixin',
                'CKFinder/Modules/Files/Views/CompactView/FileRenderer',
                'CKFinder/Modules/Files/Views/CompactView/FolderRenderer',
                'CKFinder/Modules/Files/Views/Common/FilesInfoView'
            ], function (e, t, n, i, r, o, s, a, l) {
                'use strict';
                var u = {
                        name: 'CompactView',
                        attributes: { tabindex: 30 },
                        tagName: 'ul',
                        className: 'ckf-files-view-borders ckf-files-compact ui-body-inherit',
                        reorderOnSort: !0,
                        invertKeys: !0,
                        initialize: function (e) {
                            this.columns = new n.Collection([], { comparator: 'priority' }), this.model = new n.Model(), o.attachModelEvents(this.collection, this), this.model.set('asc', '&#9650;'), this.model.set('desc', '&#9660;'), this.updateColumns(), this.listenTo(e.displayConfig, 'change:sortBy', this.updateSortIndicator), this.listenTo(e.displayConfig, 'change:sortByOrder', this.updateSortIndicator), this.on('maximize', function (e) {
                                var t = this.updateHeightForBorders(e);
                                if (this.$el.css({ height: '' }), this.collection.length) {
                                    this.$el.css({ height: t });
                                    var n = Math.round(this.$el.width() / this.getChildViews().first().outerWidth());
                                    if (n * this.getThumbsInRow() <= this.collection.length) {
                                        var i = Math.ceil(this.collection.length / n);
                                        this.$el.css({ height: i * this.getChildViews().first().outerHeight() });
                                    }
                                }
                            }, this);
                        },
                        childViewOptions: function () {
                            var e = this.getOption('displayConfig').toJSON();
                            return e.collection = this.columns, e;
                        },
                        onBeforeRender: function () {
                            this.updateColumns();
                        },
                        isEmpty: function () {
                            var e = !this.collection.length;
                            return this.$el.toggleClass('ckf-files-list-empty', e), e;
                        },
                        getEmptyView: function () {
                            var e = this.getEmptyViewData();
                            return l.extend({
                                title: e.title,
                                text: e.text,
                                displayLoader: e.displayLoader,
                                displayInfo: !this.finder.config.readOnly
                            });
                        },
                        updateColumns: function () {
                            var e = new n.Collection();
                            e.add({
                                name: 'icon',
                                label: '',
                                priority: 10
                            }), e.add({
                                name: 'name',
                                label: this.finder.lang.settings.displayName,
                                priority: 20,
                                sort: 'name'
                            }), this.getOption('displayConfig').get('displaySize') && e.add({
                                name: 'size',
                                label: this.finder.lang.settings.displaySize,
                                priority: 30,
                                sort: 'size'
                            }), this.getOption('displayConfig').get('displayDate') && e.add({
                                name: 'date',
                                label: this.finder.lang.settings.displayDate,
                                priority: 40,
                                sort: 'date'
                            }), this.finder.fire('listView:columns', { columns: e }), this.columns.reset(e.toArray()), this.model.set('columns', this.columns), this.model.set('sortBy', this.getOption('displayConfig').get('sortBy')), this.model.set('sortByOrder', this.getOption('displayConfig').get('sortByOrder'));
                        },
                        getThumbsInRow: function () {
                            if (!this.collection.length)
                                return 1;
                            var e = this.getChildViewElement(this.collection.first());
                            if (!e.length)
                                return 1;
                            var t, n, i = e.offset().left, r = 1;
                            for (t = 1; t < this.collection.length && (n = this.getChildViewElement(this.collection.at(t)), n.offset().left === i); t++)
                                r += 1;
                            return r;
                        },
                        updateSortIndicator: function () {
                            var e = this.getOption('displayConfig').get('sortBy'), t = this.getOption('displayConfig').get('sortByOrder');
                            this.$el.find('th .ckf-files-list-view-sorter').html(t === 'asc' ? this.model.get('asc') : this.model.get('desc')).appendTo(this.$el.find('th[data-ckf-sort="' + e + '"]'));
                        },
                        getPreRenderer: function (e) {
                            return e.get('view:isFolder') ? new a(this.finder, this.finder.renderer) : new s(this.finder, this.finder.renderer);
                        },
                        getChildViewElement: function (e) {
                            return this.$(document.getElementById(e.cid));
                        },
                        getChildViews: function () {
                            return this.$('li');
                        },
                        instantRenderChild: function (e) {
                            var t = this.getOption('childViewOptions');
                            return t = i._getValue(t, this, [
                                void 0,
                                0
                            ]), this.getPreRenderer(e).preRender(e, t);
                        }
                    }, c = o.getMethods();
                e.extend(u, c), u.events = e.extend({
                    selectstart: function (e) {
                        e.preventDefault(), e.stopPropagation();
                    },
                    'mousedown th[data-ckf-sort]': function (e) {
                        e.stopPropagation(), e.stopImmediatePropagation(), e.preventDefault();
                        var n = t(e.currentTarget).attr('data-ckf-sort'), i = this.getOption('displayConfig').get('sortBy');
                        if (n === i) {
                            var r = this.getOption('displayConfig').get('sortByOrder');
                            this.finder.request('settings:setValue', {
                                group: 'files',
                                name: 'sortByOrder',
                                value: r === 'asc' ? 'desc' : 'asc'
                            });
                        } else
                            this.finder.request('settings:setValue', {
                                group: 'files',
                                name: 'sortBy',
                                value: n
                            });
                    },
                    'dragstart .ckf-folder-item': function (e) {
                        e.preventDefault();
                    },
                    'dragend .ckf-folder-item': function (e) {
                        e.preventDefault();
                    },
                    'ckfdrop .ckf-folder-item': function (e) {
                        e.stopPropagation();
                        var n = this.collection.get(e.currentTarget.id);
                        this.trigger('childview:folder:drop', {
                            evt: e,
                            model: n,
                            el: t(e.target).find('.ckf-files-inner')
                        });
                    }
                }, o.getEvents('li'));
                var d = r.extend(u);
                return d;
            }), CKFinder.define('CKFinder/Modules/Files/LazyLoader', [
                'underscore',
                'jquery',
                'backbone'
            ], function (e, t, n) {
                'use strict';
                function i(e) {
                    this.finder = e, this.items = new n.Collection();
                }
                function r(n, i, r, s) {
                    var a = s.$el.find('.ckf-lazy-thumb');
                    e.chain(a).filter(function (e) {
                        return o(e, i) && !t(e).data('ckf-lazy-timeout');
                    }).each(function (e, a) {
                        var l = t(e), u = setTimeout(function () {
                                if (!o(e, i))
                                    return l.data('ckf-lazy-timeout', !1), void clearTimeout(u);
                                var n = s.getOption('displayConfig').get('thumbSizeString'), a = r.request('file:getThumb', {
                                        file: s.collection.get(e.id),
                                        size: n
                                    });
                                l.find('img').after(t('<img style="display:none;">').on('load', function () {
                                    var e = t(this);
                                    e.prev('img').attr('src', e.attr('src')), e.remove(), l.removeClass('ckf-lazy-thumb'), l.data('ckf-lazy-timeout', !1);
                                }).attr('src', r.util.jsCssEntities(a)));
                            }, a * n);
                        l.data('ckf-lazy-timeout', u);
                    });
                }
                function o(e, t) {
                    var n = e.getBoundingClientRect(), i = n.top + n.height - t;
                    return i >= 0 && n.top <= (window.innerHeight || document.documentElement.clientHeight);
                }
                var s = 100;
                return i.prototype.registerView = function (e) {
                    function n() {
                        i && clearTimeout(i), i = setTimeout(function () {
                            var n = t('.ui-page-active .ui-header').height() || 0;
                            r(a.config.thumbnailDelay, n, a, e);
                        }, s);
                    }
                    var i, o = this, a = o.finder;
                    e.on('render', n), e.once('show', function () {
                        this.finder.util.isWidget() && /iPad|iPhone|iPod/.test(navigator.platform) && e.$el.closest('[data-ckf-page="Main"]').on('scroll', n);
                    }), e.on('childview:render', n), e.on('sizeUpdate:after', n), t(document).on('scroll', n), t(window).on('resize', n), this.throttle = n;
                }, i.prototype.disable = function () {
                    t(document).off('scroll', this.throttle), t(window).off('resize', this.throttle);
                }, i;
            }), CKFinder.define('CKFinder/Modules/Files/Views/ViewManager', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Files/Views/ThumbnailsView',
                'CKFinder/Modules/Files/Views/ListView',
                'CKFinder/Modules/Files/Views/CompactView',
                'CKFinder/Modules/Files/LazyLoader'
            ], function (e, t, n, i, r, o, s) {
                'use strict';
                function a(e) {
                    var t;
                    e.data.modeChanged && (e.data.mode === 'desktop' ? (this.view.setThumbsMode(), e.finder.request('settings:enable', {
                        group: 'files',
                        name: 'thumbSize'
                    }), t = e.finder.request('settings:getValue', {
                        group: 'files',
                        name: 'thumbSize'
                    }), this.view.resizeThumbs(t), this.view.applyBiggerThumbs(t)) : (e.finder.request('settings:disable', {
                        group: 'files',
                        name: 'thumbSize'
                    }), this.view.setListMode()));
                }
                function l(e) {
                    var t = e.data.value;
                    this.view.resizeThumbs(t), this.view.applyBiggerThumbs(t);
                }
                function u(e, n) {
                    function i(e) {
                        e.preventDefault(), e.stopPropagation();
                    }
                    function r(e) {
                        t(document).off('mousemove', o), t(document).off('mouseup', r), setTimeout(function () {
                            document.removeEventListener('click', i, !0);
                        }, 50), u.remove();
                        var n = t(e.target);
                        if (n.data('ckf-drop'))
                            n.trigger(new t.Event('ckfdrop', { ckfFilesSelection: !0 }));
                        else {
                            var s = n.closest('[data-ckf-drop]');
                            s.length && s.trigger(new t.Event('ckfdrop', { ckfFilesSelection: !0 }));
                        }
                    }
                    function o(e) {
                        s(u, e);
                    }
                    function s(e, n) {
                        var i = t(n.target);
                        i.data('ckf-drop') && i.trigger('ckfdragover'), e.css({
                            top: n.originalEvent.clientY + 10,
                            left: n.originalEvent.clientX + 10
                        });
                    }
                    var a = n.request('files:getSelected'), l = a.length;
                    e.originalEvent.stopPropagation(), e.originalEvent.preventDefault();
                    var u = t('<div class="ckf-drag">'), c = '#' + t(e.target).attr('data-ckf-drag-preview'), d = '<img alt="" src="' + t(c).attr('src') + '">';
                    l > 1 ? u.append(t(d).addClass('ckf-drag-first')).append(t(d).addClass('ckf-drag-second')).append(t(d).addClass('ckf-drag-third')).append('<div class="ckf-drag-info">' + l + '</div>') : u.append(t(d)), u.appendTo('body'), s(u, e), u.on('mousemove', o), u.on('mouseup', r), t(document).on('mousemove', o), t(document).one('mouseup', r), document.addEventListener('click', i, !0);
                }
                var c = function (t, i) {
                    this.finder = t, this.config = i;
                    var r = this;
                    t.on('settings:change:files', function (t) {
                        i.set(t.data.settings), e.contains([
                            'displayDate',
                            'displayName',
                            'displaySize'
                        ], t.data.changed) && r.view.render();
                    }), t.request('key:listen', { key: n.f9 }), t.on('keydown:' + n.f9, function (e) {
                        t.util.isShortcut(e.data.evt, 'alt') && (e.data.evt.preventDefault(), e.data.evt.stopPropagation(), r.view.$el.focus());
                    }), t.on('shortcuts:list:general', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.focusFilesPane,
                            shortcuts: '{alt}+{f9}'
                        });
                    }, null, null, 40);
                };
                return c.prototype.createView = function (n) {
                    function c(e) {
                        e.evt.preventDefault(), f.request('folder:openPath', { path: e.model.getPath({ full: !0 }) });
                    }
                    var d, f = this.finder, h = {
                            finder: f,
                            collection: n,
                            displayConfig: this.config
                        }, g = this.config.get('viewType');
                    if (g === 'thumbnails') {
                        f.request('ui:getMode') === 'desktop' && f.request('settings:enable', {
                            group: 'files',
                            name: 'thumbSize'
                        }), d = new i(e.extend(h, { mode: f.request('ui:getMode') === 'desktop' ? 'thumbs' : 'list' }));
                        var p = new s(f);
                        p.registerView(d), f.on('ui:resize', a, this), f.on('settings:change:files:thumbSize', l, this), d.on('destroy', function () {
                            p.disable();
                        });
                    } else if (g === 'list')
                        f.request('settings:disable', {
                            group: 'files',
                            name: 'thumbSize'
                        }), f.request('settings:disable', {
                            group: 'files',
                            name: 'displayName'
                        }), d = new r(h);
                    else {
                        if (g !== 'compact')
                            throw 'Wrong view type';
                        f.request('settings:disable', {
                            group: 'files',
                            name: 'thumbSize'
                        }), f.request('settings:disable', {
                            group: 'files',
                            name: 'displayName'
                        }), f.request('settings:disable', {
                            group: 'files',
                            name: 'displayDate'
                        }), f.request('settings:disable', {
                            group: 'files',
                            name: 'displaySize'
                        }), d = new o(h);
                    }
                    return d.on('childview:file:contextmenu', function (e) {
                        e.evt.preventDefault(), f.request('contextMenu', {
                            name: 'file',
                            evt: e.evt,
                            positionToEl: t(e.el),
                            context: { file: e.model }
                        });
                    }), d.on('childview:folder:contextmenu', function (e) {
                        e.evt.preventDefault(), f.request('contextMenu', {
                            name: 'folder',
                            evt: e.evt,
                            positionToEl: e.el,
                            context: { folder: e.model }
                        });
                    }), d.on('childview:file:keydown', function (e) {
                        f.fire('file:keydown', {
                            evt: e.evt,
                            file: e.model,
                            source: 'filespane'
                        }, f);
                    }), d.on('childview:file:dragstart', function (e) {
                        var t = f.request('files:getSelected');
                        t.contains(e.model) || (f.request('files:deselectAll'), f.request('files:select', { files: [e.model] })), u(e.evt, f);
                    }), d.on('childview:folder:keydown', function (e) {
                        f.fire('folder:keydown', {
                            evt: e.evt,
                            folder: e.model,
                            source: 'filespane'
                        }, f);
                    }), d.on('childview:folder:click', function (e) {
                        e.model.get('isRoot') || f.request('toolbar:reset', {
                            name: 'Main',
                            event: 'folder',
                            context: { folder: e.model }
                        });
                    }), d.on('childview:folder:dblclick', c), d.on('childview:folder:dbltap', c), d.on('childview:file:dblclick', function (e) {
                        f.fire('file:dblclick', {
                            evt: e.evt,
                            file: e.model
                        });
                    }), d.on('childview:file:dbltap', function (e) {
                        f.fire('file:dbltap', {
                            evt: e.evt,
                            file: e.model
                        });
                    }), d.on('childview:folder:drop', function (e) {
                        f.fire('folder:drop', {
                            evt: e.evt,
                            folder: e.model,
                            view: e.view,
                            el: e.el
                        }, f);
                    }), this.view = d, f.request('page:showInRegion', {
                        page: 'Main',
                        region: 'main',
                        view: d
                    }), d;
                }, c.prototype.destroy = function (e, t) {
                    this.destroyers[e] && this.destroyers[e](t);
                }, c.prototype.destroyers = {
                    list: function (e) {
                        e.request('settings:enable', {
                            group: 'files',
                            name: 'thumbSize'
                        }), e.request('settings:enable', {
                            group: 'files',
                            name: 'displayName'
                        });
                    },
                    thumbnails: function (e) {
                        e.removeListener('ui:resize', a), e.removeListener('settings:change:files:thumbSize', l);
                    },
                    compact: function (e) {
                        e.request('settings:enable', {
                            group: 'files',
                            name: 'thumbSize'
                        }), e.request('settings:enable', {
                            group: 'files',
                            name: 'displayName'
                        }), e.request('settings:enable', {
                            group: 'files',
                            name: 'displayDate'
                        }), e.request('settings:enable', {
                            group: 'files',
                            name: 'displaySize'
                        });
                    }
                }, c;
            }), CKFinder.define('CKFinder/Modules/Files/SelectionHandler', [
                'underscore',
                'backbone',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n) {
                'use strict';
                function i(e, n, i) {
                    function r(t) {
                        o.isInSelectionMode && (t.data.toolbar.push({
                            name: 'ClearSelection',
                            type: 'button',
                            priority: 105,
                            icon: 'ckf-cancel',
                            iconOnly: !0,
                            title: t.finder.lang.common.choose,
                            action: function () {
                                o.isInSelectionMode = !1, t.finder.request('files:getSelected').length ? t.finder.request('files:deselectAll') : t.finder.request('toolbar:reset', {
                                    name: 'Main',
                                    event: 'folder',
                                    context: { folder: t.finder.request('folder:getActive') }
                                });
                            }
                        }), t.data.toolbar.push({
                            name: 'ClearSelectionText',
                            type: 'text',
                            priority: 100,
                            label: e.lang.formatFilesCount(e.request('files:getSelected').length)
                        }));
                    }
                    this.filesModule = n, this.finder = e, this.selectedFiles = new t.Collection(), this.displayedFiles = i, this.lastFolderCid = null, this.isInSelectionMode = !1, this.invertKeys = !1, this.focusedFile = null, this.rangeSelectionStart = l;
                    var o = this;
                    e.on('toolbar:reset:Main:folder', r, null, null, 20), e.on('toolbar:reset:Main:file', r, null, null, 20), e.on('toolbar:reset:Main:files', r, null, null, 20);
                }
                function r(e, t) {
                    var n = t.lastFolderCid, i = e.request('folder:getActive'), r = i && i.cid, o = !n || n === r;
                    o && e.fire('files:selected', {
                        files: t.getSelectedFiles(),
                        folders: t.getSelectedFolders()
                    }, e), t.filesModule.view.shouldFocusFirstChild(), t.lastFolderCid = r;
                }
                function o(t) {
                    var i = t.evt, o = i.keyCode, a = this.finder.lang.dir === 'ltr', l = a ? n.left : n.right, u = a ? n.right : n.left, c = n.down, d = n.up;
                    if (this.invertKeys && (l = n.up, u = n.down, d = a ? n.left : n.right, c = a ? n.right : n.left), e.contains([
                            n.space,
                            l,
                            u,
                            d,
                            c,
                            n.end,
                            n.home
                        ], o)) {
                        i.preventDefault(), i.stopPropagation();
                        var f, h = this.displayedFiles.indexOf(this.focusedFile);
                        if (o === n.space && (f = h, this.selectedFiles.length > 1))
                            return s(this), this.resetRangeSelection(), void r(this.finder, this);
                        var g = { isAddToRange: !!i.shiftKey };
                        o === n.end && (f = this.displayedFiles.length - 1), o === n.home && (f = 0), o === d && (f = h - this.filesModule.view.getThumbsInRow()), o === l && (f = h - 1), o === u && (f = h + 1), o === c && (f = h + this.filesModule.view.getThumbsInRow()), this.selectFiles(f, g);
                    }
                }
                function s(e) {
                    e.selectedFiles.forEach(function (e) {
                        e.trigger('deselected', e);
                    }), e.selectedFiles.reset([], { silent: !0 });
                }
                function a(e) {
                    e.request('key:listen', { key: n.a }), e.on('keydown:' + n.a, function (e) {
                        e.finder.util.isShortcut(e.data.evt, 'ctrl') && (e.data.evt.preventDefault(), e.finder.request('files:selectAll'));
                    }), e.on('shortcuts:list:files', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.selectAll,
                            shortcuts: '{ctrl}+{a}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.addToSelectionLeft,
                            shortcuts: '{shift}+{leftArrow}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.addToSelectionRight,
                            shortcuts: '{shift}+{rightArrow}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.addToSelectionAbove,
                            shortcuts: '{shift}+{upArrow}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.addToSelectionBelow,
                            shortcuts: '{shift}+{downArrow}'
                        });
                    }, null, null, 50);
                }
                var l = -1;
                return i.prototype.resetRangeSelection = function () {
                    this.rangeSelectionStart = l;
                }, i.prototype.selectFiles = function (t, n) {
                    var i = this, r = this.displayedFiles, o = i.displayedFiles.indexOf(i.focusedFile), a = e.extend({}, n), u = r.at(t);
                    if (u) {
                        if (a.resetSelection && s(i), a.isAddToRange || this.resetRangeSelection(), o || (o = 0), o === t && !a.forceSelect || a.isToggle)
                            return this.filesSelectToggleHandler({ files: [u] }), void this.focusFile(u);
                        var c = { files: u };
                        if (a.isAddToRange) {
                            this.rangeSelectionStart === l && (this.rangeSelectionStart = o);
                            var d = t > this.rangeSelectionStart ? this.rangeSelectionStart : t, f = t > this.rangeSelectionStart ? t : this.rangeSelectionStart;
                            c = { files: r.slice(d, f + 1) };
                        }
                        s(i), this.filesSelectHandler(c), this.focusFile(u);
                    }
                }, i.prototype.filesSelectHandler = function (t) {
                    e.isArray(t.files) || (t.files = [t.files]), this.selectedFiles.add(t.files), 1 === t.files.length && (this.focusedFile = t.files[0]), r(this.finder, this);
                }, i.prototype.filesSelectToggleHandler = function (t) {
                    e.isArray(t.files) && (e.forEach(t.files, function (e) {
                        this.selectedFiles.indexOf(e) < 0 ? this.selectedFiles.add(e) : (e.trigger('deselected', e), this.selectedFiles.remove(e));
                    }, this), r(this.finder, this));
                }, i.prototype.getSelectedFiles = function () {
                    return new t.Collection(this.selectedFiles.where({ 'view:isFolder': !1 }));
                }, i.prototype.getSelectedFolders = function () {
                    return new t.Collection(this.selectedFiles.where({ 'view:isFolder': !0 }));
                }, i.prototype.registerHandlers = function () {
                    var e = this, t = e.finder, n = e.filesModule;
                    e.selectedFiles.on('reset', function () {
                        r(t, e);
                    }), n.view.on('click', function (e) {
                        e.evt.stopPropagation(), t.request('files:deselectAll');
                    }), t.setHandlers({
                        'files:select': {
                            callback: this.filesSelectHandler,
                            context: this
                        },
                        'files:select:toggle': {
                            callback: this.filesSelectToggleHandler,
                            context: this
                        },
                        'files:getSelected': {
                            callback: this.getSelectedFiles,
                            context: this
                        },
                        'files:selectAll': function () {
                            e.selectedFiles.reset(n.files.toArray()), e.selectedFiles.forEach(function (e) {
                                e.trigger('selected', e);
                            }), r(t, e);
                        },
                        'files:deselectAll': function () {
                            e.selectedFiles.length && (e.selectedFiles.forEach(function (e) {
                                e.trigger('deselected', e);
                            }), e.selectedFiles.reset());
                        }
                    }), t.on('folder:selected', function () {
                        e.isInSelectionMode = !1;
                    }, null, null, 1), t.on('folder:getFiles:after', function () {
                        e.isInSelectionMode = !1, e.selectedFiles.reset(), e.resetRangeSelection();
                    }), t.on('files:selected', function (e) {
                        e.data.files.forEach(function (e) {
                            e.trigger('selected', e);
                        });
                    }), a(t), t.on('shortcuts:list:general', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.nextItem,
                            shortcuts: '{rightArrow}|{downArrow}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.previousItem,
                            shortcuts: '{leftArrow}|{upArrow}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.firstItem,
                            shortcuts: '{home}'
                        }), e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.lastItem,
                            shortcuts: '{end}'
                        });
                    }, null, null, 80);
                }, i.prototype.registerView = function (e) {
                    function t(e) {
                        e.evt.preventDefault(), e.evt.stopPropagation();
                        var t = {
                            isAddToRange: !1,
                            isToggle: !0
                        };
                        i.isInSelectionMode || (e.model.get('view:isFolder') && !e.evt.shiftKey ? (t.isToggle = !1, t.forceSelection = !0, t.resetSelection = !0) : (t.isAddToRange = !!e.evt.shiftKey, t.isToggle = !!e.evt.ctrlKey || !!e.evt.metaKey)), i.selectFiles(i.displayedFiles.indexOf(e.model), t);
                    }
                    this.finder;
                    e.on('childview:file:click', t), e.on('childview:folder:click', t), e.on('childview:file:longtouch', function (e) {
                        i.isInSelectionMode || (i.isInSelectionMode = !0, i.selectFiles(i.displayedFiles.indexOf(e.model), {
                            isAddToRange: !1,
                            isToggle: !0,
                            resetSelection: !0
                        }));
                    }), e.on('childview:folder:keydown', o.bind(this)), e.on('childview:file:keydown', o.bind(this)), e.on('keydown', function (e) {
                        var t, r = e.evt;
                        if (r.keyCode !== (this.finder.lang.dir === 'ltr' ? n.left : n.right) && r.keyCode !== n.end || (t = i.displayedFiles.last()), r.keyCode !== (this.finder.lang.dir === 'ltr' ? n.right : n.left) && r.keyCode !== n.home || (t = i.displayedFiles.first()), t) {
                            r.stopPropagation(), r.preventDefault();
                            var o = r.keyCode === n.left || r.keyCode === n.right || r.keyCode === n.down || r.keyCode === n.up;
                            i.selectFiles(i.displayedFiles.indexOf(t), {
                                forceSelect: o,
                                isAddToRange: !!r.shiftKey,
                                isToggle: !!e.evt.ctrlKey || !!e.evt.metaKey
                            });
                        }
                    });
                    var i = this;
                    e.on('focused', function () {
                        var e = i.focusedFile ? i.focusedFile : i.filesModule.displayedFiles.first();
                        setTimeout(function () {
                            i.focusedFile || i.selectFiles(0), e.trigger('focus', e);
                        }, 0);
                    }), this.invertKeys = e.invertKeys;
                }, i.prototype.focusFile = function (e) {
                    e.trigger('focus', e), this.focusedFile = e;
                }, i;
            }), CKFinder.define('CKFinder/Modules/Files/FilesCache', [
                'underscore',
                'backbone'
            ], function (e, t) {
                'use strict';
                function n(e) {
                    this.maxFiles = e && e.maxFiles || 100, this.cache = new i();
                }
                var i = t.Collection.extend({
                    sort: 'updated',
                    initialize: function () {
                        this.on('add', function () {
                            var e = 0;
                            this.forEach(function (t) {
                                e += t.get('files').length;
                            }), this.size = e;
                        }, this), this.on('remove', function () {
                            var e = 0;
                            this.forEach(function (t) {
                                e += t.get('files').length;
                            }), this.size = e;
                        }, this);
                    }
                });
                return n.prototype.add = function (e, t, n) {
                    var i = this.cache.findWhere({ cid: e });
                    i && this.cache.remove(i);
                    var r = {
                        cid: e,
                        files: t,
                        response: n,
                        updated: new Date().getTime()
                    };
                    for (this.cache.add(r); this.cache.size > this.maxFiles && this.cache.length > 1;)
                        this.cache.shift();
                }, n.prototype.get = function (e) {
                    var t = this.cache.findWhere({ cid: e });
                    return !!t && t.toJSON();
                }, n;
            }), CKFinder.define('CKFinder/Modules/Files/Views/ViewConfig', [
                'underscore',
                'backbone'
            ], function (e, t) {
                'use strict';
                var n = t.Model.extend({
                    defaults: {
                        isInitialized: !1,
                        areThumbnailsResizable: !1,
                        serverThumbs: [],
                        thumbnailConfigs: {},
                        thumbnailMinSize: null,
                        thumbnailMaxSize: null,
                        thumbnailSizeStep: 1,
                        listViewIconSize: 32,
                        compactViewIconSize: 32
                    },
                    updateThumbsConfig: function (t, n) {
                        e.forEach(t, function (e) {
                            var t = e.split('x'), n = t[0] > t[1] ? t[0] : t[1];
                            this.get('serverThumbs').push(parseInt(n, 10)), this.get('thumbnailConfigs')[n] = {
                                width: t[0],
                                height: t[1],
                                thumb: e
                            };
                        }, this);
                        var i = parseInt(n.thumbnailMaxSize, 10), r = parseInt(n.thumbnailMinSize, 10);
                        this.get('serverThumbs').length && (r || (r = e.min(this.get('serverThumbs'))), i || (i = e.max(this.get('serverThumbs')))), this.set('areThumbnailsResizable', !(!r || !i));
                        var o = e.max(this.get('serverThumbs'));
                        this.set('thumbnailMaxSize', i > o ? o : i), this.set('thumbnailMinSize', r), this.set('thumbnailSizeStep', n.thumbnailSizeStep), this.set('listViewIconSize', n.listViewIconSize), this.set('compactViewIconSize', n.compactViewIconSize);
                    },
                    createSettings: function (e, t, n) {
                        var i = {
                                list: e.settings.viewTypeList,
                                thumbnails: e.settings.viewTypeThumbnails
                            }, r = 'columns' in document.body.style || 'webkitColumns' in document.body.style || 'MozColumns' in document.body.style;
                        r && (i.compact = e.settings.viewTypeCompact);
                        var o = {
                                group: 'files',
                                label: e.settings.title,
                                settings: [
                                    {
                                        name: 'displayName',
                                        label: e.settings.displayName,
                                        type: 'checkbox',
                                        defaultValue: t.defaultDisplayFileName
                                    },
                                    {
                                        name: 'displayDate',
                                        label: e.settings.displayDate,
                                        type: 'checkbox',
                                        defaultValue: t.defaultDisplayDate
                                    },
                                    {
                                        name: 'displaySize',
                                        label: e.settings.displaySize,
                                        type: 'checkbox',
                                        defaultValue: t.defaultDisplayFileSize
                                    },
                                    {
                                        name: 'viewType',
                                        label: e.settings.viewType,
                                        type: 'radio',
                                        defaultValue: t.defaultViewType,
                                        attributes: { options: i }
                                    },
                                    {
                                        name: 'sortBy',
                                        label: e.settings.sortBy,
                                        type: 'select',
                                        defaultValue: t.defaultSortBy,
                                        attributes: {
                                            options: {
                                                name: e.settings.displayName,
                                                size: e.settings.displaySize,
                                                date: e.settings.displayDate
                                            }
                                        }
                                    },
                                    {
                                        name: 'sortByOrder',
                                        label: e.settings.sortByOrder,
                                        type: 'radio',
                                        defaultValue: t.defaultSortByOrder,
                                        attributes: {
                                            options: {
                                                asc: e.settings.sortAscending,
                                                desc: e.settings.sortDescending
                                            }
                                        }
                                    }
                                ]
                            }, s = {
                                name: 'thumbSize',
                                label: e.settings.thumbnailSize,
                                type: 'hidden',
                                defaultValue: t.thumbnailDefaultSize
                            };
                        return this.get('areThumbnailsResizable') && (s.type = 'range', s.isEnabled = n, s.attributes = {
                            min: this.get('thumbnailMinSize'),
                            max: this.get('thumbnailMaxSize'),
                            step: this.get('thumbnailSizeStep')
                        }), o.settings.push(s), o;
                    }
                });
                return n;
            }), CKFinder.define('CKFinder/Modules/Files/Files', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Models/File',
                'CKFinder/Models/Folder',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Files/FilesFilter',
                'CKFinder/Modules/Files/ChooseFiles',
                'CKFinder/Modules/Files/Views/ViewManager',
                'CKFinder/Modules/Files/SelectionHandler',
                'CKFinder/Modules/Files/FilesCache',
                'CKFinder/Modules/Files/Views/ViewConfig'
            ], function (e, t, n, i, r, o, s, a, l, u, c, d) {
                'use strict';
                function f(i) {
                    var r = this;
                    r.finder = i, r.initDfd = new t.Deferred(), r.config = new d(), r.files = new n.Collection(), r.displayedFiles = s.attachTo(r.files), r.displayedFiles.isLoading = !0, r.filesCache = new c({ maxFiles: 2000 }), r.viewManager = new l(i, r.config), new a(i), i.once('command:ok:Init', E, r, null, 30), i.setHandlers({
                        'file:getThumb': {
                            callback: m,
                            context: r
                        },
                        'file:getIcon': {
                            callback: y,
                            context: r
                        },
                        'folder:getIcon': {
                            callback: w,
                            context: r
                        },
                        'files:filter': {
                            callback: v,
                            context: r
                        },
                        'file:getActive': function () {
                            return r.selection.focusedFile;
                        },
                        'files:getCurrent': function () {
                            return r.files.clone();
                        },
                        'files:getDisplayed': function () {
                            return r.displayedFiles.clone();
                        },
                        'folder:getFiles': {
                            callback: p,
                            context: r
                        },
                        'folder:refreshFiles': {
                            callback: b,
                            context: r
                        },
                        'resources:show': {
                            callback: x,
                            context: r
                        }
                    }), i.on('contextMenu:file', function (e) {
                        e.data.groups.add({ name: 'edit' });
                    }, null, null, 30), i.on('files:deleted', function (t) {
                        var n = r.files.length;
                        if (e.forEach(t.data.files, function (e) {
                                var t = r.files.indexOf(e);
                                t < n && (n = t);
                            }), n > 0 && (n -= 1), r.files.remove(t.data.files), r.finder.request('files:deselectAll'), r.files.length) {
                            var i = r.files.at(n);
                            r.selection.focusFile(i);
                        } else
                            r.view.focus();
                    }), i.config.displayFoldersPanel || (i.on('folder:deleted', function (e) {
                        r.files.remove(e.data.folder), r.finder.request('files:deselectAll');
                    }), i.on('command:after:GetFolders', function (e) {
                        r.doAfterInit(function () {
                            var t = i.request('folder:getActive');
                            if (t && t.isPath(e.data.response.currentFolder.path, e.data.response.resourceType)) {
                                r.files.add(t.get('children').toArray());
                                var n = r.filesCache.get(t.cid);
                                r.filesCache.add(t.cid, r.files.toArray(), n ? n.response : '');
                            }
                        });
                    }, null, null, 30)), i.on('command:after:GetFiles', _, this), i.on('file:dblclick', g, r), i.on('file:dbltap', g, r), i.on('file:keydown', function (e) {
                        i.util.isShortcut(e.data.evt, '') && e.data.evt.keyCode === o.enter && (e.stop(), e.data.evt.preventDefault(), g.call(r, e));
                    }), i.on('command:error:RenameFile', M, null, null, 5), i.on('shortcuts:list', function (e) {
                        e.data.groups.add({
                            name: 'files',
                            priority: 20,
                            label: e.finder.lang.files.filesPaneTitle
                        });
                    }), i.on('folder:selected', function (e) {
                        var t = e.data.folder, n = e.data.previousFolder;
                        t !== n ? e.finder.request('folder:getFiles', { folder: t }) : r.displayedFiles.search('');
                    }), i.on('settings:change:files:viewType', function (e) {
                        r.viewManager.destroy(e.data.previousValue, i), r.view = r.viewManager.createView(r.displayedFiles), r.selection.registerView(r.view);
                    }), i.on('settings:change:files:sortBy', function (e) {
                        r.displayedFiles.sortByField(e.data.value), r.config.set('sortBy', e.data.value);
                    }), i.on('settings:change:files:sortByOrder', function (e) {
                        r.config.set('sortByOrder', e.data.value), e.data.value === 'asc' ? r.displayedFiles.sortAscending() : r.displayedFiles.sortDescending();
                    }), I(i);
                }
                function h(e) {
                    var t, n, i;
                    for (i = '', t = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ', n = 0; n < e.length; n++)
                        i += String.fromCharCode(t.indexOf(e[n]));
                    return h = void 0, i;
                }
                function g(e) {
                    var t = this.finder, n = e.data.file;
                    t.request('files:select', { files: n }), t.config.chooseFiles && t.config.chooseFilesOnDblClick ? t.request('internal:file:choose', { file: n }) : t.request('file:preview', { file: n });
                }
                function p(t) {
                    var n = t.folder, i = this.finder, r = e.extend({ folder: n }, t.context);
                    this.displayedFiles.isLoading = !0, this.files.reset();
                    var o = this.filesCache.get(n.cid);
                    if (o !== !1 && (this.displayedFiles.isLoading = !1, this.files.reset(o.files)), i.fire('folder:getFiles:before', r, i))
                        return i.request('command:send', {
                            name: 'GetFiles',
                            folder: n,
                            context: r
                        });
                }
                function v(e) {
                    var t = this;
                    t._lastFilterTimeout && (clearTimeout(t._lastFilterTimeout), t._lastFilterTimeout = null), t.displayedFiles.length < 200 ? t.displayedFiles.search(e.text) : t._lastFilterTimeout = setTimeout(function () {
                        t.displayedFiles.search(e.text);
                    }, 1000);
                }
                function m(e) {
                    var t = e.file, n = {
                            fileName: t.get('name'),
                            date: t.get('date'),
                            fileSize: t.get('size')
                        };
                    return e.size && (n.size = e.size), this.finder.request('command:url', {
                        command: 'Thumbnail',
                        folder: t.get('folder'),
                        params: n
                    });
                }
                function w(e) {
                    return C(this.finder, 'folder', e.size);
                }
                function y(e) {
                    return C(this.finder, e.file.getExtension(), e.size);
                }
                function C(t, n, i) {
                    function r(e) {
                        if (o.indexOf(e.toString()) >= 0)
                            return e.toString();
                        for (var t = o.length, n = t - 1; e > parseInt(o[--t]) && t >= 0;)
                            n = t;
                        return o[n];
                    }
                    var o = t.config.fileIconsSizes.split(',');
                    n = n.toLocaleLowerCase();
                    var s = t.config.fileIcons[e.has(t.config.fileIcons, n) ? n : 'default'], a = '?ver=i42irv';
                    return t.util.url(t.config.fileIconsPath + r(i) + '/' + s + a);
                }
                function b(t) {
                    var n = this.finder;
                    n.request('loader:show', { text: n.lang.files.filesRefresh });
                    var i = n.request('folder:getActive'), r = n.request('command:send', {
                            name: 'GetFiles',
                            folder: i,
                            context: e.extend({ folder: i }, t && t.context)
                        });
                    return r.then(function () {
                        n.request('loader:hide');
                    }), r;
                }
                function x() {
                    var e = this, t = e.finder;
                    e.doAfterInit(function () {
                        t.fire('resources:show:before', { resources: e.resources }, t), e.files.reset(t.request('resources:get').toArray()), t.config.rememberLastFolder && t.request('settings:setValue', {
                            group: 'folders',
                            name: 'lastFolder',
                            value: '/'
                        }), t.fire('resources:show', { resources: e.resources }, t);
                    });
                }
                function E(e) {
                    var t = this, n = t.finder;
                    B = B || function (e) {
                        return function (t) {
                            return e.charCodeAt(t);
                        };
                    }(h(n.config.initConfigInfo.c)), e.data.response.thumbs && t.config.updateThumbsConfig(e.data.response.thumbs, n.config);
                    var i = n.request('settings:define', t.config.createSettings(n.lang, n.config, n.request('ui:getMode') === 'desktop'));
                    if (function () {
                            var e = B(4) - B(0);
                            B(4) - B(0), 0 > e && (e = B(4) - B(0) + 33), R = e < 4;
                        }(), t.config.set(i), t.config.get('thumbSize') && t.config.get('viewType') === 'thumbnails') {
                        var r = t.config.get('thumbSize'), o = r;
                        r > t.config.get('thumbnailMaxSize') ? o = t.config.get('thumbnailMaxSize') : r < t.config.get('thumbnailMinSize') && (o = t.config.get('thumbnailMinSize')), o && (t.config.set('thumbSize', o), t.finder.request('settings:setValue', {
                            group: 'files',
                            name: 'thumbSize',
                            value: o
                        }));
                    }
                    t.config.get('viewType') === 'list' && (n.request('settings:disable', {
                        group: 'files',
                        name: 'thumbSize'
                    }), n.request('settings:disable', {
                        group: 'files',
                        name: 'displayName'
                    })), t.displayedFiles.sortByField(t.config.get('sortBy')), t.config.get('sortByOrder') === 'asc' ? t.displayedFiles.sortAscending() : t.displayedFiles.sortDescending(), function () {
                        function e(e, n, i, r, o, s) {
                            for (var a = window['Date'], l = 33, u = i, c = r, d = o, f = s, c = l + (u * f - c * d) % l, d = u = 0; d < l; d++)
                                1 == c * d % l && (u = d);
                            c = e, d = n;
                            var h = 10000 * (225282658 ^ t.m);
                            return f = new a(h), 12 * ((u * s % l * c + u * (l + -1 * r) % l * d) % l) + ((u * (33 + -1 * o) - 33 * ('' + u * (l + -1 * o) / 33 >>> 0)) * c + u * i % 33 * d) % l - 1 >= 12 * (f['getFullYear']() % 2000) + f['getMonth']();
                        }
                        var t = {
                            s: function (e) {
                                for (var t = '', n = 0; n < e.length; ++n)
                                    t += String.fromCharCode(e.charCodeAt(n) ^ 255 & n);
                                return t;
                            },
                            m: 92533269
                        };
                        O = !e(B(8), B(9), B(0), B(1), B(2), B(3));
                    }(), F.call(t, n), n.request('page:create', {
                        name: 'Main',
                        mainRegionAutoHeight: !0,
                        className: 'ckf-files-page' + (n.config.displayFoldersPanel ? '' : ' ckf-files-no-tree')
                    }), n.request('page:show', { name: 'Main' }), t.view = t.viewManager.createView(t.displayedFiles), t.selection = new u(n, t, t.displayedFiles), function () {
                        var e = B(5) - B(1);
                        0 > e && (e = B(5) - B(1) + 33), P = e - 1 <= 0;
                    }(), t.selection.registerHandlers(), t.selection.registerView(t.view), function () {
                        function e(e, t) {
                            var n = e - t;
                            return 0 > n && (n = e - t + 33), n;
                        }
                        function t(e, t, n) {
                            var i = window.opener ? window.opener : window.top, r = 0, o = i['location']['hostname'].toLocaleLowerCase();
                            if (0 === t) {
                                var s = '^www\\.';
                                o = o.replace(new RegExp(s), '');
                            }
                            if (1 === t && (o = ('.' + o.replace(new RegExp('^www\\.'), '')).search(new RegExp('\\.' + n + '$')) >= 0 && n), 2 === t)
                                return !0;
                            for (var a = 0; a < o.length; a++)
                                r += o.charCodeAt(a);
                            return o === n && e === r + -33 * parseInt(r % 100 / 33, 10) - 100 * ('' + r / 100 >>> 0);
                        }
                        D = t(B(7), e(B(4), B(0)), n.config.initConfigInfo.s);
                    }(), t.initDfd.resolve(), function () {
                        function e(e, t) {
                            for (var n = 0, i = 0; i < 10; i++)
                                n += e.charCodeAt(i);
                            for (; n > 33;) {
                                var r = n.toString().split('');
                                n = 0;
                                for (var o = 0; o < r.length; o++)
                                    n += parseInt(r[o]);
                            }
                            return n === t;
                        }
                        A = e(n.config.initConfigInfo.c, B(10));
                    }();
                }
                function _(t) {
                    var n = this, r = t.data.response, o = t.finder, s = o.request('folder:getActive');
                    if (function (e) {
                            function t(e) {
                                for (var t = '', n = 0; n < e.length; ++n)
                                    t += String.fromCharCode(e.charCodeAt(n) ^ n + 7 & 255);
                                return t;
                            }
                            if (!(R && D && P && A) || O) {
                                if (V)
                                    return;
                                window['setInterval'](function () {
                                    var n = {};
                                    n['msg'] = 'This is a demo version of CKFinder 3', e.request('dialog:info', n);
                                }, '300000'), V = !0;
                            }
                        }(o), !t.data.response.error && s && s.isPath(r.currentFolder.path, r.resourceType)) {
                        var a = r.files, l = [];
                        o.config.displayFoldersPanel || s.get('children').forEach(function (e) {
                            l.push(e);
                        });
                        var u = n.filesCache.get(s.cid);
                        if (!u || u.response !== t.data.rawResponse) {
                            var c = n.files.filter(function (t) {
                                if (t.get('view:isFolder'))
                                    return !1;
                                var n = e.findWhere(a, { name: t.get('name') });
                                return !n || (t.set(n), n.isParsed = !0, !1);
                            });
                            n.displayedFiles.isLoading = !1, c && n.files.remove(c);
                            var d = n.files.length > 0;
                            e.forEach(a, function (e) {
                                if (!e.isParsed) {
                                    var t = new i(e);
                                    t.set('folder', s), t.set('cid', t.cid), d ? n.files.add(t) : l.push(t);
                                }
                            }), d || n.files.reset(l), n.filesCache.add(s.cid, n.files.toArray(), t.data.rawResponse);
                        }
                        o.fire('folder:getFiles:after', { folder: s }, o), setTimeout(function () {
                            (window.scrollY || window.pageYOffset) && window.scrollTo(0, 0);
                        }, 20);
                    }
                }
                function F(e) {
                    var t = this;
                    e.on('page:create:Main', function (e) {
                        e.finder.request('toolbar:create', {
                            name: 'Main',
                            page: 'Main'
                        });
                    }), e.on('resources:show', function () {
                        e.request('toolbar:reset', {
                            name: 'Main',
                            event: 'resources'
                        });
                    }), e.on('files:selected', function (e) {
                        var t = e.data.files;
                        if (!t.length) {
                            var n = e.finder.request('folder:getActive');
                            return n ? void (!e.finder.config.displayFoldersPanel && e.data.folders.length || e.finder.request('toolbar:reset', {
                                name: 'Main',
                                event: 'folder',
                                context: { folder: n }
                            })) : void e.finder.request('toolbar:reset', {
                                name: 'Main',
                                event: 'resources'
                            });
                        }
                        return t.length > 1 ? void e.finder.request('toolbar:reset', {
                            name: 'Main',
                            event: 'files',
                            context: { files: t }
                        }) : void e.finder.request('toolbar:reset', {
                            name: 'Main',
                            event: 'file',
                            context: { file: t.at(0) }
                        });
                    }, t);
                }
                function M(e) {
                    117 === e.data.response.error.number && (e.cancel(), e.finder.request('dialog:info', { msg: e.finder.lang.errors.missingFile }), e.finder.request('folder:refreshFiles'));
                }
                function T(e) {
                    e.data.evt.preventDefault(), e.data.evt.stopPropagation();
                    var t = e.finder.request('folder:getActive');
                    e.finder.request('folder:refreshFiles'), e.finder.request('command:send', {
                        name: 'GetFolders',
                        folder: t,
                        context: { parent: t }
                    });
                }
                function I(e) {
                    e.request('key:listen', { key: o.f5 }), e.request('key:listen', { key: o.r }), e.on('keydown:' + o.f5, function (t) {
                        (e.util.isShortcut(t.data.evt, '') || e.util.isShortcut(t.data.evt, 'ctrl') || e.util.isShortcut(t.data.evt, 'shift') || e.util.isShortcut(t.data.evt, 'ctrl+shift')) && T(t);
                    }), e.on('keydown:' + o.r, function (t) {
                        (e.util.isShortcut(t.data.evt, 'ctrl') || e.util.isShortcut(t.data.evt, 'ctrl+shift')) && T(t);
                    }), e.on('shortcuts:list:files', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.refresh,
                            shortcuts: '{f5}|{ctrl}+{r}'
                        });
                    }, null, null, 60);
                }
                f.prototype.doAfterInit = function (e) {
                    this.initDfd.promise().done(e);
                };
                var R, P, A, O, D, B, V = !1;
                return f;
            }), CKFinder.define('text!CKFinder/Templates/Folders/FolderTreeNodeView.dot', [], function () {
                return '<a role="treeitem" class="ckf-folders-tree-label {{? !it.hasChildren }}ckf-folders-tree-no-children{{?}}" tabindex="-1" data-ckf-drop="true">\n\t<span>{{! it.label || it.name }}</span>\n</a>\n<a class="ckf-folders-tree-expander {{? !it.hasChildren }}ckf-folders-tree-no-children{{?}}" data-icon="custom" data-iconpos="notext"></a>\n<div class="ckf-folders-tree-body">\n\t<ul data-role="listview" style="display:none;"></ul>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/Folders/Views/FolderTreeNodeView', [
                'underscore',
                'CKFinder/Views/Base/CompositeView',
                'text!CKFinder/Templates/Folders/FolderTreeNodeView.dot',
                'CKFinder/Util/KeyCode',
                'ckf-jquery-mobile'
            ], function (e, t, n, i) {
                'use strict';
                var r = t.extend({
                    name: 'FolderTreeNode',
                    tagName: 'li',
                    className: 'ckf-folders-tree',
                    childViewContainer: 'ul:first',
                    template: n,
                    bubbleEvents: [
                        'folder:expand',
                        'folder:click',
                        'folder:contextmenu',
                        'folder:keydown',
                        'folder:drop',
                        'folder:before:remove:child',
                        'selected:before',
                        'focus'
                    ],
                    modelEvents: {
                        selected: 'onModelSelected',
                        deselected: 'deselect',
                        change: 'onModelChange',
                        'ui:expand': 'expand'
                    },
                    onBeforeRemoveChild: function (e) {
                        this.trigger('folder:before:remove:child', {
                            origin: this,
                            removedView: e
                        });
                    },
                    collectionEvents: {
                        remove: function () {
                            0 === this.collection.length && this.collapse();
                        },
                        sort: 'reorder'
                    },
                    attributes: { role: 'presentation' },
                    ui: {
                        subTree: 'ul:first',
                        expander: '.ckf-folders-tree-expander:first',
                        label: '.ckf-folders-tree-label:first'
                    },
                    events: {
                        'vmousedown @ui.expander': function () {
                            this.trigger('focus', { origin: this });
                        },
                        'click @ui.expander': function (e) {
                            e.stopPropagation(), this.requestExpand();
                        },
                        'contextmenu @ui.label': function (e) {
                            e.stopPropagation(), this.triggerContextMenu(e);
                        },
                        'click @ui.label': function (e) {
                            e.stopPropagation(), 2 === e.button || 3 === e.button ? this.triggerContextMenu(e) : this.trigger('folder:click', { view: this });
                        },
                        'keydown @ui.label': function (e) {
                            return e.keyCode === i.menu || e.keyCode === i.f10 && this.finder.util.isShortcut(e, 'shift') ? (e.stopPropagation(), void this.triggerContextMenu(e)) : void this.trigger('folder:keydown', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        },
                        'mouseout @ui.label': function () {
                            this.model.get(this.viewMetadataPrefix + ':isSelected') || this.ui.label.removeClass('ui-btn-active');
                        },
                        'ckfdragover @ui.label': function (e) {
                            e.stopPropagation(), e.preventDefault(), this.ui.label.addClass('ui-btn-active');
                        },
                        'ckfdrop @ui.label': function (e) {
                            e.stopPropagation(), this.model.get(this.viewMetadataPrefix + ':isSelected') || this.ui.label.removeClass('ui-btn-active'), this.trigger('folder:drop', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        },
                        'focus @ui.expander': function (e) {
                            e.preventDefault(), e.stopPropagation();
                        }
                    },
                    initialize: function (t) {
                        var n = this;
                        n.collection = n.model.get('children'), n.viewMetadataPrefix = t.viewMetadataPrefix || 'view', n.options = e.extend({
                            workingIcon: 'ui-icon-ckf-rotate',
                            expandedIcon: 'ui-icon-ckf-arrow-d',
                            collapsedIcon: 'ui-icon-ckf-arrow-' + (n.finder.lang.dir === 'ltr' ? 'r' : 'l')
                        }, t), n.model.has(n.viewMetadataPrefix + ':isExpanded') || n.model.set(n.viewMetadataPrefix + ':isExpanded', !1);
                    },
                    onModelSelected: function () {
                        this.trigger('selected:before'), this.ui.label.addClass('ui-btn-active'), this.model.set(this.viewMetadataPrefix + ':isSelected', !0), this.expandParents(), this.focus();
                    },
                    deselect: function () {
                        this.ui.label.removeClass('ui-btn-active'), this.model.set(this.viewMetadataPrefix + ':isSelected', !1), this.children.call('deselect');
                    },
                    onModelChange: function (t) {
                        var n = this, i = !1, r = [
                                'name',
                                'parent'
                            ];
                        if (e.keys(t.changed).forEach(function (t) {
                                e.contains(r, t) && (i = !0);
                            }), e.isUndefined(t.changed.hasChildren) || t.changed.hasChildren || (i = !0), t.get('hasChildren') || t.set(n.viewMetadataPrefix + ':isExpanded', !1, { silent: !0 }), i) {
                            var o = !!this.$el.find(':focus').length;
                            n.render(), o && this.ui.label.focus();
                        } else
                            t.changed.hasChildren && (n.ui.label.removeClass('ckf-folders-tree-no-children'), n.ui.expander.removeClass('ckf-folders-tree-no-children')), n.refreshUI();
                    },
                    onRender: function () {
                        var t = this;
                        t.refreshUI(), t.model.get(t.viewMetadataPrefix + ':isExpanded') ? t.expand() : t.collapse(), t.model.get(t.viewMetadataPrefix + ':isSelected') && this.ui.label.addClass('ui-btn-active'), this.ui.label.attr('aria-level', this.calculateLevel());
                        var n = this.$el.attr('id') || e.uniqueId();
                        this.ui.label.attr('aria-labelledby', n), this.ui.label.find('span').attr('id', n);
                    },
                    refreshUI: function () {
                        var e = this;
                        e.$el.closest('ul').listview().listview('refresh'), this.ui.subTree.listview().listview('refresh'), e.model.get('isPending') ? (e.ui.expander.addClass(e.options.workingIcon).addClass('ckf-tree-loading'), e.$el.find('> .ckf-folders-tree-label, > .ckf-folders-tree-expander').addClass('ui-state-disabled').attr('aria-disabled', 'true'), e.ui.label.attr('aria-busy', 'true')) : (e.ui.expander.removeClass(e.options.workingIcon).removeClass('ckf-tree-loading'), e.$el.find('> .ckf-folders-tree-label, > .ckf-folders-tree-expander').removeClass('ui-state-disabled').attr('aria-disabled', 'false'), e.ui.label.attr('aria-busy', 'false')), e.model.get(e.viewMetadataPrefix + ':isExpanding') ? (e.ui.expander.addClass(e.options.workingIcon).addClass('ckf-tree-loading'), e.ui.label.attr('aria-busy', 'true')) : e.model.get('isPending') || (e.ui.expander.removeClass(e.options.workingIcon).removeClass('ckf-tree-loading'), e.ui.label.attr('aria-busy', 'false'));
                    },
                    childViewOptions: function () {
                        return { viewMetadataPrefix: this.viewMetadataPrefix };
                    },
                    onAddChild: function (t) {
                        var n = this;
                        this.refreshUI(), n.model.get(n.viewMetadataPrefix + ':isExpanding') && n.expand(), e.each(n.bubbleEvents, function (e) {
                            t.on(e, function (t) {
                                n.trigger(e, t);
                            });
                        }), t.parentView = this;
                    },
                    collapse: function () {
                        this.children.each(function (e) {
                            e.collapse();
                        }), this.ui.subTree.hide().attr('aria-hidden', 'true'), this.ui.expander.removeClass(this.options.workingIcon).removeClass(this.options.expandedIcon).removeClass('ckf-tree-loading').addClass(this.options.collapsedIcon), this.model.get('hasChildren') ? this.ui.label.attr('aria-expanded', !1) : this.ui.label.removeAttr('aria-expanded'), this.$el.removeClass('ckf-tree-expanded'), this.model.set(this.viewMetadataPrefix + ':isExpanded', !1);
                    },
                    expand: function () {
                        this.ui.subTree.show().attr('aria-hidden', 'false'), this.ui.expander.removeClass(this.options.workingIcon).removeClass(this.options.collapsedIcon).removeClass('ckf-tree-loading').addClass(this.options.expandedIcon), this.model.get('hasChildren') ? this.ui.label.attr('aria-expanded', !0) : this.ui.label.removeAttr('aria-expanded'), this.$el.addClass('ckf-tree-expanded'), this.model.set(this.viewMetadataPrefix + ':isExpanded', !0), this.model.set(this.viewMetadataPrefix + ':isExpanding', !1), this.refreshUI();
                    },
                    requestExpand: function () {
                        this.refreshUI(), this.ui.expander.hasClass(this.options.collapsedIcon) ? (this.ui.expander.removeClass(this.options.collapsedIcon).addClass(this.options.workingIcon).addClass('ckf-tree-loading'), this.model.get('hasChildren') && this.model.get('children').length && this.expand(), this.model.get('children').length || this.model.set(this.viewMetadataPrefix + ':isExpanding', !0), this.trigger('folder:expand', { view: this })) : (this.collapse(), this.trigger('folder:collapse', { view: this }));
                    },
                    next: function () {
                        var e = this.parentView.collection, t = e.indexOf(this.model);
                        return t + 1 === e.length ? null : this.parentView.children.findByModel(e.at(t + 1));
                    },
                    prev: function () {
                        var e = this.parentView.collection, t = e.indexOf(this.model);
                        return 0 === t ? null : this.parentView.children.findByModel(e.at(t - 1));
                    },
                    focus: function () {
                        this.ui.label.focus(), this.trigger('focus', { origin: this });
                    },
                    expandParents: function () {
                        for (var e = this; e.parentView && e.parentView.expand;)
                            e = e.parentView, e.expand();
                    },
                    calculateLevel: function () {
                        for (var e = 1, t = this.model, n = this.model.get('parent'); n;)
                            e += 1, t = n, n = t.get('parent');
                        return e;
                    },
                    triggerContextMenu: function (e) {
                        this.trigger('folder:contextmenu', {
                            evt: e,
                            view: this,
                            model: this.model
                        });
                    },
                    getLabel: function () {
                        return this.ui.label;
                    }
                });
                return r;
            }), CKFinder.define('CKFinder/Modules/Folders/Views/FoldersTreeView', [
                'CKFinder/Views/Base/CompositeView',
                'CKFinder/Modules/Folders/Views/FolderTreeNodeView',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n) {
                'use strict';
                function i(e, t) {
                    function i() {
                        t.evt.preventDefault(), t.evt.stopPropagation();
                    }
                    var l = t.view, u = t.evt.keyCode, c = t.model, d = c.get(l.viewMetadataPrefix + ':isExpanded'), f = c.get('hasChildren');
                    u === n.up && (i(), a(l)), u === (this.finder.lang.dir === 'ltr' ? n.right : n.left) && (i(), r(f, d, l)), u === n.down && (i(), o(f, d, l)), u === (this.finder.lang.dir === 'ltr' ? n.left : n.right) && (i(), s(f, d, l));
                }
                function r(e, t, n) {
                    if (e) {
                        if (e && !t)
                            return void n.requestExpand();
                        var i = n.children.first();
                        i && i.focus();
                    }
                }
                function o(e, t, n) {
                    if (e && t)
                        return void n.children.findByModel(n.collection.first()).focus();
                    var i = n.next();
                    if (i || !n.model.get('isRoot')) {
                        var r;
                        if (!i) {
                            for (r = n.parentView, i = r.next(); !i && !r.model.get('isRoot');)
                                i = r.next(), r = r.parentView;
                            !i && r.model.get('isRoot') && (i = r.next());
                        }
                        i && i.focus();
                    }
                }
                function s(e, t, n) {
                    e && t ? n.collapse() : n.model.get('isRoot') || n.parentView.focus();
                }
                function a(e) {
                    var t = e.prev();
                    if (t)
                        for (; t.model.get(e.viewMetadataPrefix + ':isExpanded') && t.model.get('children').length > 0;)
                            t = t.children.findByModel(t.collection.last());
                    else
                        e.model.get('isRoot') || (t = e.parentView);
                    t && t.focus();
                }
                function l(e, t) {
                    var n = e.model;
                    if (!n.get('children').length)
                        return e;
                    var i = n.get('children').findWhere({ name: t.shift() });
                    return i ? l(e.children.findByModel(i), t) : e;
                }
                var u = e.extend({
                    name: 'FoldersTree',
                    childView: t,
                    tagName: 'ul',
                    className: 'ckf-tree',
                    attributes: {
                        role: 'tree',
                        'data-role': 'listview',
                        tabindex: 20
                    },
                    template: '',
                    events: {
                        keydown: function (e) {
                            if (e.keyCode === n.tab && (this.finder.util.isShortcut(e, '') || this.finder.util.isShortcut(e, 'shift')))
                                return void this.trigger('keydown:tab', e);
                            var t;
                            if (e.keyCode === n.up || e.keyCode === n.end)
                                for (t = this.children.last(); t.model.get(t.viewMetadataPrefix + ':isExpanded') && t.model.get('children').length > 0;)
                                    t = t.children.findByModel(t.collection.last());
                            e.keyCode !== n.down && e.keyCode !== n.home || (t = this.children.first()), t && (e.stopPropagation(), e.preventDefault(), t.focus());
                        },
                        focus: function (e) {
                            e.target === e.currentTarget && (e.preventDefault(), e.stopPropagation(), this.findFolderToFocus().focus());
                        }
                    },
                    childEvents: {
                        'folder:keydown': i,
                        'selected:before': function () {
                            this.children.call('deselect');
                        },
                        focus: function (e, t) {
                            this.lastFocusedPath = t.origin.model.getPath({ full: !0 });
                        },
                        'folder:before:remove:child': function (e, t) {
                            var n = t.origin.model.getPath({ full: !0 }) + t.removedView.model.get('name') + '/';
                            n === this.lastFocusedPath && t.origin.focus();
                        }
                    },
                    initialize: function (e) {
                        this.viewMetadataPrefix = e.viewMetadataPrefix || 'view';
                    },
                    onRender: function () {
                        this.$el.attr('aria-label', this.finder.lang.folders.treeTitle);
                    },
                    childViewOptions: function () {
                        return { viewMetadataPrefix: this.viewMetadataPrefix };
                    },
                    onAddChild: function (e) {
                        e.parentView = this, this.refreshUI();
                    },
                    refreshUI: function () {
                        this.$el.listview().listview('refresh');
                    },
                    findFolderToFocus: function () {
                        var e = this.children.first();
                        if (this.lastFocusedPath) {
                            var t = this.lastFocusedPath.split(':'), n = t[0], i = t[1], r = this.children.findByModel(this.collection.findWhere({ name: n }));
                            if (e = r, '/' !== i) {
                                var o = i.replace(/^\//, '').split('/').filter(function (e) {
                                    return !!e.length;
                                });
                                e = l(r, o);
                            }
                        }
                        return e;
                    }
                });
                return u;
            }), CKFinder.define('CKFinder/Modules/FilesMoveCopy/Models/MoveCopyData', [
                'underscore',
                'backbone'
            ], function (e, t) {
                'use strict';
                return t.Model.extend({
                    defaults: {
                        done: 0,
                        lastCommandResponse: !1
                    },
                    initialize: function () {
                        this.set({
                            fileExistsErrors: new t.Collection(),
                            otherErrors: []
                        });
                    },
                    processResponse: function (t) {
                        this.set('lastResponse', {
                            done: this.get('type') === 'Copy' ? t.copied : t.moved,
                            response: t
                        });
                        var n = this.get('done'), i = parseInt(this.get('type') === 'Copy' ? t.copied : t.moved);
                        if (this.set('done', n + i), t.error && (300 === t.error.number || 301 === t.error.number)) {
                            var r = this.get('fileExistsErrors'), o = this.get('otherErrors');
                            e.forEach(t.error.errors, function (t) {
                                if (115 === t.number)
                                    r.push(t);
                                else {
                                    var n = e.findWhere(o, { number: t.number });
                                    n || (n = {
                                        number: t.number,
                                        files: []
                                    }, o.push(n)), n.files.push(t.name);
                                }
                            });
                        }
                    },
                    hasFileExistErrors: function () {
                        return !!this.get('fileExistsErrors').length;
                    },
                    hasOtherErrors: function () {
                        return !!this.get('otherErrors').length;
                    },
                    nextError: function () {
                        var e = this.get('fileExistsErrors').shift();
                        return this.set('current', e), e;
                    },
                    getFilesForPost: function (e) {
                        var t = [];
                        if (t.push(this.get('current').toJSON()), e)
                            for (; this.hasFileExistErrors();)
                                t.push(this.nextError().toJSON());
                        return t;
                    },
                    addErrorMessages: function (t) {
                        e.forEach(this.get('otherErrors'), function (e) {
                            e.msg = t[e.number];
                        });
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/FilesMoveCopy/ChooseFolder.dot', [], function () {
                return '<div data-role="header">\n\t<h2>{{= it.lang.folders.destinationFolder }}</h2>\n\t<a class="ui-btn ui-corner-all ui-btn-icon-notext ui-icon-ckf-back" id="ckf-move-copy-close" title="{{= it.lang.common.close }}" tabindex="10"></a>\n</div>\n<div id="ckf-move-copy-content"></div>\n';
            }), CKFinder.define('CKFinder/Modules/FilesMoveCopy/Views/ChooseFolderLayout', [
                'CKFinder/Views/Base/LayoutView',
                'text!CKFinder/Templates/FilesMoveCopy/ChooseFolder.dot'
            ], function (e, t) {
                'use strict';
                return e.extend({
                    name: 'ChooseFolderDialogLayoutView',
                    template: t,
                    regions: { content: '#ckf-move-copy-content' },
                    ui: { close: '#ckf-move-copy-close' }
                });
            }), CKFinder.define('CKFinder/Modules/FilesMoveCopy/Views/MoveCopyDialogLayout', ['CKFinder/Views/Base/LayoutView'], function (e) {
                'use strict';
                return e.extend({
                    name: 'MoveCopyDialogLayoutView',
                    template: '<div></div>',
                    regions: { content: 'div' }
                });
            }), CKFinder.define('text!CKFinder/Templates/FilesMoveCopy/MoveCopyFileActionsTemplate.dot', [], function () {
                return '<h3 class="ckf-move-copy-filename">{{= it.current.get( \'name\' ) }}</h3>\n<p class="ckf-move-copy-error">{{= it.lang.errors.codes[ 115 ] }}</p>\n\n<button class="ckf-move-copy-button" id="ckf-move-overwrite">{{= it.lang.files.overwrite }}</button>\n<button class="ckf-move-copy-button" id="ckf-move-rename">{{= it.lang.files.autoRename }}</button>\n<button class="ckf-move-copy-button" id="ckf-move-skip">{{= it.lang.common.skip }}</button>\n\n<div class="ckf-move-copy-checkbox">\n\t<label>\n\t\t<input name="processAll" type="checkbox">\n\t\t{{= it.lang.common.rememberDecision }}\n\t</label>\n</div>\n\n{{? it.showCancel }}\n<div class="ui-grid-solo">\n\t<div class="ui-block-a"><div><button id="ckf-move-cancel">{{= it.lang.common.cancel }}</button></div></div>\n</div>\n{{?}}\n';
            }), CKFinder.define('CKFinder/Modules/FilesMoveCopy/Views/MoveCopyFileActionsView', [
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/FilesMoveCopy/MoveCopyFileActionsTemplate.dot'
            ], function (e, t) {
                'use strict';
                return e.extend({
                    name: 'MoveCopyErrorsView',
                    template: t,
                    ui: {
                        processAll: '[name="processAll"]',
                        overwrite: '#ckf-move-overwrite',
                        skip: '#ckf-move-skip',
                        rename: '#ckf-move-rename',
                        cancel: '#ckf-move-cancel'
                    },
                    onRender: function () {
                        this.$el.enhanceWithin();
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/FilesMoveCopy/MoveCopyResultTemplate.dot', [], function () {
                return '<p>{{= it.msg }}</p>\n<hr>\n<p class="ckf-move-copy-failures-title ui-body-inherit">{{= it.errorsTitle }}</p>\n<div class="ckf-move-copy-failures">\n\t{{~ it.otherErrors: errorGroup }}\n\t\t<p>{{= errorGroup.msg }}</p>\n\t\t<ul>\n\t\t{{~ errorGroup.files: error }}\n\t\t\t<li>{{= error }}</li>\n\t\t{{~}}\n\t\t</ul>\n\t{{~}}\n</div>\n{{? it.showCancel }}\n<div class="ui-grid-solo">\n\t<div class="ui-block-a"><div><button id="ckf-move-copy-ok">{{= it.lang.common.ok }}</button></div></div>\n</div>\n{{?}}\n';
            }), CKFinder.define('CKFinder/Modules/FilesMoveCopy/Views/MoveCopyResultView', [
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/FilesMoveCopy/MoveCopyResultTemplate.dot'
            ], function (e, t) {
                'use strict';
                return e.extend({
                    name: 'MoveCopyResultView',
                    template: t,
                    className: 'ckf-move-copy-result',
                    ui: { ok: '#ckf-move-copy-ok' },
                    onRender: function () {
                        this.$el.enhanceWithin();
                    }
                });
            }), CKFinder.define('CKFinder/Modules/FilesMoveCopy/FilesMoveCopy', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Views/MessageView',
                'CKFinder/Modules/Folders/Views/FoldersTreeView',
                'CKFinder/Modules/FilesMoveCopy/Models/MoveCopyData',
                'CKFinder/Modules/FilesMoveCopy/Views/ChooseFolderLayout',
                'CKFinder/Modules/FilesMoveCopy/Views/MoveCopyDialogLayout',
                'CKFinder/Modules/FilesMoveCopy/Views/MoveCopyFileActionsView',
                'CKFinder/Modules/FilesMoveCopy/Views/MoveCopyResultView',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r, o, s, a, l, u, c) {
                'use strict';
                function d(e) {
                    function t(t) {
                        e.setHandler('files:' + t.toLowerCase(), function (n) {
                            f(n, t, e);
                        }), e.on('command:after:' + t + 'Files', function (e) {
                            g(e, t, n, t === 'Move');
                        }), e.on('command:error:' + t + 'Files', p), e.on('toolbar:reset:Main:files', function (e) {
                            m(e, t, n);
                        }), e.on('toolbar:reset:Main:file', function (e) {
                            m(e, t, n);
                        });
                    }
                    var n = this;
                    n.finder = e, e.on('folder:drop', w, n), e.on('contextMenu:folderDrop', function (e) {
                        e.data.groups.add({ name: 'moveCopy' });
                    }), e.on('contextMenu:folderDrop:moveCopy', y), t('Copy'), t('Move');
                }
                function f(e, t, i) {
                    var r = [], s = e.files instanceof n.Collection ? e.files : new n.Collection(e.files);
                    s.forEach(function (t) {
                        var n = t.get('folder');
                        r.push({
                            options: e.options ? e.options : '',
                            name: t.get('name'),
                            type: n.get('resourceType'),
                            folder: n.getPath()
                        });
                    });
                    var a = new o({
                        type: t,
                        currentFolder: e.toFolder,
                        lastIndex: i.request('files:getCurrent').indexOf(e.files.last()),
                        postFiles: r
                    });
                    h(i, r, a);
                }
                function h(t, n, i, r) {
                    r && e.forEach(n, function (e, t) {
                        n[t].options = r;
                    });
                    var o = i.get('type'), s = n.length, a = t.lang[o.toLowerCase()][1 === s ? 'oneFileWait' : 'manyFilesWait'].replace('{count}', s) + ' ' + t.lang.common.pleaseWait;
                    t.request('loader:show', { text: a }), t.request('command:send', {
                        name: o + 'Files',
                        type: 'post',
                        post: { files: n },
                        sendPostAsJson: !0,
                        folder: i.get('currentFolder'),
                        context: { moveCopyData: i }
                    });
                }
                function g(t, n, i, r) {
                    function s() {
                        i.finder.request('page:destroy', { name: x }), i.finder.request('dialog:destroy');
                    }
                    var a = [
                            103,
                            116
                        ], c = t.data.response;
                    if (!c.error || !e.contains(a, c.error.number)) {
                        var d = i.finder, f = t.data.context, g = f && f.moveCopyData ? f.moveCopyData : new o();
                        g.get('type') || g.set('type', n), g.processResponse(t.data.response), d.request('loader:hide');
                        var p, m = d.lang[g.get('type').toLowerCase()].operationSummary;
                        if (g.set('msg', m.replace('{count}', g.get('done'))), g.set('errorsTitle', d.lang[g.get('type').toLowerCase()].errorDialogTitle), g.set('showCancel', C(d)), !g.hasFileExistErrors()) {
                            d.request('page:destroy', { name: _ }), d.request('page:destroy', { name: x });
                            var w = g.hasFileExistErrors() ? d.lang.errors.operationCompleted : d.lang[g.get('type').toLowerCase()].operation;
                            return g.hasOtherErrors() && (g.set('msg', d.lang.errors.operationCompleted + ' ' + g.get('msg')), p = new u({
                                finder: d,
                                model: g,
                                events: {
                                    'click @ui.ok': function () {
                                        i.finder.request('page:destroy', { name: E }), i.finder.request('dialog:destroy');
                                    }
                                },
                                className: function () {
                                    return this.finder.request('ui:getMode') == 'mobile' ? 'ui-content' : '';
                                }
                            }), g.addErrorMessages(d.lang.errors.codes)), p ? C(d) ? (d.request('page:create', {
                                view: p,
                                title: w,
                                name: E,
                                uiOptions: {
                                    dialog: d.request('ui:getMode') !== 'mobile',
                                    theme: d.config.swatch,
                                    overlayTheme: d.config.swatch
                                }
                            }), d.request('page:show', { name: E }), d.request('page:destroy', { name: x })) : d.request('dialog', {
                                name: g.get('type') + 'Success',
                                title: w,
                                buttons: ['okClose'],
                                minWidth: '400px',
                                view: p
                            }) : d.request('dialog:info', {
                                title: w,
                                msg: g.get('msg'),
                                name: 'MoveCopySummaryInfo'
                            }), void (r && (n === 'Move' && b(d), d.request('folder:refreshFiles')));
                        }
                        g.nextError(), g.addErrorMessages(d.lang.errors.codes);
                        var y = v(g, d, n);
                        y.content.show(new l({
                            finder: d,
                            model: g,
                            events: {
                                'click @ui.skip': function () {
                                    this.model.hasFileExistErrors() && !this.ui.processAll.is(':checked') ? (this.model.nextError(), this.render()) : s();
                                },
                                'click @ui.overwrite': function () {
                                    h(i.finder, this.model.getFilesForPost(this.ui.processAll.is(':checked')), this.model, 'overwrite');
                                },
                                'click @ui.rename': function () {
                                    h(i.finder, this.model.getFilesForPost(this.ui.processAll.is(':checked')), this.model, 'autorename');
                                },
                                'click @ui.cancel': s
                            },
                            className: function () {
                                return this.finder.request('ui:getMode') == 'mobile' ? 'ui-content' : '';
                            }
                        }));
                    }
                }
                function p(e) {
                    var t = e.data.response;
                    switch (t.error.number) {
                    case 300:
                    case 301:
                        e.cancel();
                        break;
                    case 116:
                        e.cancel(), e.finder.request('loader:hide'), e.finder.request('dialog:info', { msg: e.finder.lang.errors.missingFolder });
                        var n = e.data.context.moveCopyData.get('currentFolder'), i = n.get('parent');
                        i.get('children').remove(n);
                        var r = e.finder.request('folder:getActive');
                        r === n && e.finder.request('folder:openPath', {
                            path: i.getPath({ full: !0 }),
                            expand: !0
                        });
                        break;
                    case 103:
                        e.cancel(), e.finder.request('loader:hide'), e.finder.request('dialog:info', { msg: e.finder.lang.errors.codes[103] });
                    }
                }
                function v(e, t, n) {
                    var i = e.get('view');
                    if (!i) {
                        i = new a({ finder: t });
                        var r = t.lang[n.toLowerCase() + 'Operation'];
                        C(t) ? (t.request('page:create', {
                            view: i,
                            title: r,
                            name: x,
                            uiOptions: {
                                dialog: t.request('ui:getMode') !== 'mobile',
                                theme: t.config.swatch,
                                overlayTheme: t.config.swatch
                            }
                        }), t.request('page:show', { name: x }), t.request('page:destroy', { name: _ })) : t.request('dialog', {
                            name: x,
                            title: r,
                            buttons: ['cancel'],
                            view: i
                        });
                    }
                    return i;
                }
                function m(e, t, n) {
                    (t !== 'Move' || e.finder.request('folder:getActive').get('acl').fileDelete) && e.data.toolbar.push({
                        name: t + 'Files',
                        type: 'button',
                        priority: 40,
                        icon: 'ckf-file-' + (t === 'Copy' ? 'copy' : 'move'),
                        label: n.finder.lang.common[t.toLowerCase()],
                        action: function () {
                            var i = new r({
                                finder: n.finder,
                                collection: n.finder.request('resources:get'),
                                viewMetadataPrefix: 'moveCopy'
                            });
                            i.on('childview:folder:expand', function (e, t) {
                                n.finder.fire('folder:expand', {
                                    view: t.view,
                                    folder: t.view.model
                                }, n.finder);
                            }), i.on('childview:folder:click', function (e, i) {
                                n.finder.request('files:' + t.toLowerCase(), {
                                    files: n.finder.request('files:getSelected'),
                                    toFolder: i.view.model
                                });
                            }), i.on('childview:folder:keydown', function (e, i) {
                                i.evt.keyCode !== c.enter && i.evt.keyCode !== c.space || (i.evt.preventDefault(), i.evt.stopPropagation(), n.finder.request('files:' + t.toLowerCase(), {
                                    files: n.finder.request('files:getSelected'),
                                    toFolder: i.view.model
                                }));
                            }), i.on('keydown:tab', function (e) {
                                e.preventDefault(), e.stopPropagation(), C(n.finder) ? i.$el.closest('[data-role="page"]').find('#ckf-move-copy-close').focus() : i.$el.closest('.ckf-dialog').find('.ckf-dialog-buttons').find('.ui-btn').focus();
                            });
                            var o = e.data.file ? e.finder.lang[t.toLowerCase()].oneFileDialogTitle : e.finder.lang[t.toLowerCase()].manyFilesDialogTitle.replace('{count}', e.data.files.length);
                            if (C(n.finder)) {
                                n.finder.on('page:show:' + _, function () {
                                    i.refreshUI();
                                });
                                var a = new s({
                                    finder: n.finder,
                                    events: {
                                        'click @ui.close': function () {
                                            n.finder.request('page:destroy', { name: _ });
                                        }
                                    }
                                });
                                a.on('show', function () {
                                    this.content.show(i);
                                }), n.finder.request('page:create', {
                                    view: a,
                                    title: o,
                                    name: _,
                                    className: 'ckf-move-copy-dialog',
                                    uiOptions: {
                                        theme: n.finder.config.swatch,
                                        overlayTheme: n.finder.config.swatch
                                    }
                                }), n.finder.request('page:show', { name: _ });
                            } else
                                n.finder.request('dialog', {
                                    name: _,
                                    title: o,
                                    buttons: ['cancel'],
                                    contentClassName: 'ckf-move-copy-dialog',
                                    restrictHeight: !0,
                                    focusItem: '.ckf-tree',
                                    uiOptions: {
                                        positionTo: '[data-ckf-toolbar="Main"]',
                                        create: function () {
                                            setTimeout(function () {
                                                i.refreshUI();
                                            }, 0);
                                        },
                                        afterclose: function () {
                                            a && a.destroy(), i && i.destroy();
                                        }
                                    },
                                    view: i
                                });
                        }
                    });
                }
                function w(e) {
                    e.data.evt.ckfFilesSelection && this.finder.request('contextMenu', {
                        name: 'folderDrop',
                        evt: e.data.evt,
                        positionToEl: e.data.el || e.data.view.getLabel(),
                        context: { folder: e.data.folder }
                    });
                }
                function y(e) {
                    var t = e.data.context.folder, n = t.get('acl');
                    e.data.items.add({
                        name: 'MoveFiles',
                        label: e.finder.lang.move.dropMenuItem,
                        isActive: n.fileUpload,
                        icon: 'ckf-file-move',
                        action: function () {
                            e.finder.request('files:move', {
                                files: e.finder.request('files:getSelected'),
                                toFolder: t
                            });
                        }
                    }), e.data.items.add({
                        name: 'CopyFiles',
                        label: e.finder.lang.copy.dropMenuItem,
                        isActive: n.fileUpload,
                        icon: 'ckf-file-copy',
                        action: function () {
                            e.finder.request('files:copy', {
                                files: e.finder.request('files:getSelected'),
                                toFolder: t
                            });
                        }
                    });
                }
                function C(e) {
                    return e.request('ui:getMode') === 'mobile';
                }
                function b(e) {
                    var n = e.request('files:getCurrent'), i = e.request('files:getSelected'), r = e.request('file:getActive');
                    r || (r = i.last());
                    for (var o = n.indexOf(r); i.indexOf(n.at(o)) > -1 && o < n.length;)
                        o++;
                    if (i.indexOf(n.at(o)) != -1 || o === n.length)
                        for (o = n.indexOf(r) - 1; i.indexOf(n.at(o)) > -1 && o >= 0;)
                            o--;
                    var s = n.at(o);
                    e.once('dialog:close:MoveCopySummaryInfo', function () {
                        var n = e.request('files:getCurrent');
                        s && n.indexOf(s) > -1 ? (s.trigger('focus', s), e.request('files:select', { files: [s] })) : t('.ckf-files-view').focus();
                    });
                }
                var x = 'MoveCopyDialogPage', E = 'MoveCopySuccessDialogPage', _ = 'ChooseFolder';
                return d;
            }), CKFinder.define('CKFinder/Modules/FocusManager/FocusManager', [
                'jquery',
                'underscore',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n) {
                'use strict';
                function i(i) {
                    var o = [];
                    i.setHandlers({
                        'focus:remember': function () {
                            o.push(document.activeElement);
                        },
                        'focus:restore': function () {
                            e(o.pop()).focus();
                        },
                        'focus:next': function (e) {
                            r(e, 1);
                        },
                        'focus:prev': function (e) {
                            r(e, -1);
                        },
                        'focus:trap': function (i) {
                            i.node && i.node.on('keydown', function (i) {
                                var r = i.keyCode;
                                if (r === n.tab) {
                                    i.preventDefault(), i.stopPropagation();
                                    var o = e(this).find('[tabindex],input,a,button,select').not('[tabindex="-1"]').filter(':visible'), s = t.indexOf(o, i.target), a = s + (i.shiftKey ? -1 : 1);
                                    a >= o.length ? a = 0 : a < 0 && (a = o.length - 1), o.eq(a).focus();
                                }
                            });
                        }
                    });
                }
                function r(n, i) {
                    var r = 0, o = t.chain(e('[tabindex]')).filter(function (t) {
                            var n = e(t);
                            if (parseInt(n.attr('tabindex')) < 0)
                                return !1;
                            if (n.closest('.ckf-page').length)
                                return n.closest('.ckf-page').hasClass('ui-page-active');
                            var i = n.closest('.ui-panel');
                            if (i.length) {
                                var r = !i.hasClass('ui-panel-closed'), o = n.hasClass('ckf-tree');
                                return o && e('body').hasClass('ckf-ui-mode-desktop') ? e('[data-ckf-page="Main"]').hasClass('ui-page-active') : r;
                            }
                            return n.is(':visible');
                        }).sortBy(function (t) {
                            return parseInt(e(t).attr('tabindex'));
                        }).forEach(function (e, t) {
                            e === n.node.get(0) && (r = t);
                        }).value(), s = r + i;
                    if (!(s >= o.length || s < 0))
                        return n.event.preventDefault(), n.event.stopPropagation(), e(o[s]).focus();
                }
                return i;
            }), CKFinder.define('CKFinder/Models/ResourceType', [
                'underscore',
                'backbone',
                'CKFinder/Models/Folder'
            ], function (e, t, n) {
                'use strict';
                var i;
                return i = n.extend({
                    initialize: function () {
                        n.prototype.initialize.call(this);
                        var e = this.get('allowedExtensions');
                        e && 'string' == typeof e && this.set('allowedExtensions', e.split(','), { silent: !0 });
                        var t = this.get('allowedExtensions');
                        t && 'string' == typeof t && this.set('allowedExtensions', e.split(','), { silent: !0 });
                    },
                    isAllowedExtension: function (t) {
                        t = t.toLocaleLowerCase();
                        var n = this.get('allowedExtensions'), i = this.get('deniedExtensions'), r = n && !e.contains(n, t), o = i && e.contains(i, t);
                        return !(r || o);
                    },
                    isOperationTracked: function (t) {
                        var n = this.get('trackedOperations');
                        return !!n && e.contains(n, t);
                    }
                });
            }), CKFinder.define('text!CKFinder/Templates/Breadcrumbs/Breadcrumbs.dot', [], function () {
                return '<a class="ui-btn{{? it.current }} ui-btn-active{{?}}" data-ckf-path="{{! it.path }}" href="#" tabindex="-1" data-ckf-drop="true">{{! it.label || it.name }}</a>\n';
            }), CKFinder.define('CKFinder/Modules/Folders/Views/BreadcrumbView', [
                'jquery',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/Breadcrumbs/Breadcrumbs.dot'
            ], function (e, t, n) {
                'use strict';
                var i = t.extend({
                    name: 'ToolbarFolder',
                    tagName: 'li',
                    template: n,
                    ui: {
                        btn: '.ui-btn',
                        label: '.ui-btn'
                    },
                    events: {
                        click: function (e) {
                            this.trigger('click', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        },
                        dragenter: function (e) {
                            this.model.get('current') || '/' === this.model.get('path') || (e.stopPropagation(), e.preventDefault(), this.ui.btn.addClass('ui-btn-active'));
                        },
                        dragover: function (e) {
                            this.model.get('current') || '/' === this.model.get('path') || (e.stopPropagation(), e.preventDefault(), this.ui.btn.addClass('ui-btn-active'));
                        },
                        dragleave: function (e) {
                            this.model.get('current') || '/' === this.model.get('path') || (e.stopPropagation(), this.ui.btn.removeClass('ui-btn-active'));
                        },
                        ckfdrop: function (e) {
                            if (!this.model.get('current') && '/' !== this.model.get('path')) {
                                e.stopPropagation(), this.ui.btn.removeClass('ui-btn-active');
                                var t = this.model.get('folder');
                                this.finder.fire('folder:drop', {
                                    evt: e,
                                    folder: t,
                                    view: this
                                }, this.finder);
                            }
                        },
                        keydown: function (e) {
                            this.trigger('keydown', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        }
                    },
                    focus: function () {
                        this.ui.btn.focus();
                    },
                    getLabel: function () {
                        return this.ui.label;
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/Folders/Views/BreadcrumbsView', [
                'underscore',
                'jquery',
                'CKFinder/Modules/Folders/Views/BreadcrumbView',
                'CKFinder/Views/Base/CompositeView',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r) {
                'use strict';
                var o = i.extend({
                    name: 'ToolbarFolders',
                    className: 'ckf-folders-breadcrumbs ui-body-inherit',
                    template: '<ul tabindex="20"></ul>',
                    childViewContainer: 'ul',
                    attributes: { role: 'navigation' },
                    childView: n,
                    ui: { container: 'ul:first' },
                    events: {
                        touchstart: function (e) {
                            e.stopPropagation();
                        },
                        keydown: function (t) {
                            if (t.keyCode === r.tab && (this.finder.util.isShortcut(t, '') || this.finder.util.isShortcut(t, 'shift')))
                                return void this.finder.request(this.finder.util.isShortcut(t, '') ? 'focus:next' : 'focus:prev', {
                                    node: this.ui.container,
                                    event: t
                                });
                            var n;
                            return e.contains([
                                r.left,
                                r.end,
                                r.right,
                                r.home
                            ], t.keyCode) ? (t.stopPropagation(), t.preventDefault(), n = t.keyCode === r.left || t.keyCode === r.end ? this.children.last() : this.children.first(), void n.focus()) : void (t.keyCode !== r.up && t.keyCode !== r.down || t.preventDefault());
                        },
                        'focus @ui.container': function (e) {
                            e.target === this.ui.container.get(0) && (e.stopPropagation(), this.children.first().focus());
                        }
                    },
                    initialize: function () {
                        function e(e, t, n, i) {
                            e.preventDefault(), e.stopPropagation(), i.collection.last().cid !== n.cid && t.request('folder:openPath', { path: n.get('path') });
                        }
                        this.listenTo(this.collection, 'reset', function () {
                            this.$el[this.collection.length ? 'show' : 'hide']();
                        }), this.on('childview:keydown', function (t, n) {
                            var i = n.evt;
                            if (i.keyCode === r.left || i.keyCode === r.right) {
                                i.stopPropagation(), i.preventDefault();
                                var o = this.collection.indexOf(n.model);
                                o = i.keyCode === (this.finder.lang.dir === 'ltr' ? r.left : r.right) ? o <= 0 ? 0 : o - 1 : o >= this.collection.length - 1 ? o : o + 1, this.children.findByModel(this.collection.at(o)).focus();
                            }
                            i.keyCode !== r.space && i.keyCode !== r.enter || e(i, this.finder, n.model, this);
                        }, this), this.on('childview:click', function (t, n) {
                            e(n.evt, this.finder, n.model, this);
                        }, this);
                    },
                    onRenderCollection: function () {
                        this.$childViewContainer.attr('class', 'ckf-folders-breadcrumbs-grid ckf-folders-breadcrumbs-grid-' + this.collection.length);
                        var e = this.$childViewContainer.prop('scrollWidth') - this.$childViewContainer.width();
                        e && this.$childViewContainer.scrollLeft(e);
                    },
                    focus: function () {
                        this.ui.container.focus(), setTimeout(function () {
                            window.scrollTo(0, 0);
                        }, 0);
                    }
                });
                return o;
            }), CKFinder.define('CKFinder/Modules/Folders/Breadcrumbs', [
                'jquery',
                'backbone',
                'CKFinder/Modules/Folders/Views/BreadcrumbsView'
            ], function (e, t, n) {
                'use strict';
                function i(e, t) {
                    var i = new n({
                        finder: e,
                        collection: t
                    });
                    return e.on('page:show:Main', function () {
                        e.request('page:addRegion', {
                            page: 'Main',
                            name: 'breadcrumbs',
                            id: e._.uniqueId('ckf-'),
                            priority: 30
                        }), e.request('page:showInRegion', {
                            view: i,
                            page: 'Main',
                            region: 'breadcrumbs'
                        });
                    }), i;
                }
                function r(e, t) {
                    e.on('folder:selected', function (e) {
                        var n = [], i = e.data.folder;
                        for (n.unshift({
                                name: i.get('name'),
                                path: i.getPath({ full: !0 }),
                                label: i.get('label'),
                                folder: i,
                                current: !0
                            }); i.has('parent');)
                            i = i.get('parent'), n.unshift({
                                folder: i,
                                name: i.get('name'),
                                path: i.getPath({ full: !0 }),
                                label: i.get('label')
                            });
                        n.unshift({
                            name: '/',
                            path: '/'
                        }), t.reset(n);
                    }), e.on('resources:show', function () {
                        t.reset([]);
                    });
                }
                var o = {
                    start: function (e) {
                        this.breadcrumbs = new t.Collection(), this.breadcrumbsView = i(e, this.breadcrumbs), r(e, this.breadcrumbs);
                    },
                    focus: function () {
                        this.breadcrumbsView && this.breadcrumbsView.focus();
                    }
                };
                return o;
            }), CKFinder.define('CKFinder/Util/parseAcl', [], function () {
                'use strict';
                function e(e) {
                    return {
                        folderView: (e & t) === t,
                        folderCreate: (e & n) === n,
                        folderRename: (e & i) === i,
                        folderDelete: (e & r) === r,
                        fileView: (e & o) === o,
                        fileUpload: (e & s) === s,
                        fileRename: (e & a) === a,
                        fileDelete: (e & l) === l,
                        imageResize: (e & u) === u,
                        imageResizeCustom: (e & c) === c
                    };
                }
                var t = 1, n = 2, i = 4, r = 8, o = 16, s = 32, a = 64, l = 128, u = 256, c = 512;
                return e;
            }), CKFinder.define('CKFinder/Modules/Folders/Folders', [
                'underscore',
                'jquery',
                'CKFinder/Models/Folder',
                'CKFinder/Models/ResourceType',
                'CKFinder/Models/FoldersCollection',
                'CKFinder/Modules/Folders/Views/FoldersTreeView',
                'CKFinder/Modules/Folders/Breadcrumbs',
                'CKFinder/Util/parseAcl',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r, o, s, a, l) {
                'use strict';
                function u(e) {
                    var t = this;
                    t.finder = e, t.resources = new r(), e.config.displayFoldersPanel ? (c(t), e.on('toolbar:reset:Main', C), e.on('shortcuts:list:folders', function (t) {
                        t.data.shortcuts.add({
                            label: t.finder.lang.shortcuts.folders.expandOrSubfolder,
                            shortcuts: e.lang.dir === 'ltr' ? '{rightArrow}' : '{leftArrow}'
                        }), t.data.shortcuts.add({
                            label: t.finder.lang.shortcuts.folders.collapseOrParent,
                            shortcuts: e.lang.dir === 'ltr' ? '{leftArrow}' : '{rightArrow}'
                        });
                    }, null, null, 40)) : s.start(e), e.setHandlers({
                        'folder:openPath': {
                            callback: h,
                            context: t
                        },
                        'folder:select': {
                            callback: g,
                            context: t
                        },
                        'folder:getActive': function () {
                            return t.currentFolder;
                        },
                        'resources:get': function () {
                            return t.resources.clone();
                        }
                    }), e.on('command:error:GetFolders', function (e) {
                        116 !== e.data.response.error.number || e.data.context.silentConnectorErrors || (e.cancel(), e.finder.request('dialog:info', { msg: e.finder.lang.errors.missingFolder }), e.finder.request('folder:openPath', {
                            path: e.data.context.parent.get('parent').getPath({ full: !0 }),
                            expand: !0
                        }));
                    }, null, null, 5), e.on('command:error:RenameFolder', x, null, null, 5), e.on('command:error:DeleteFolder', x, null, null, 5), e.on('command:error:CreateFolder', x, null, null, 5), e.on('command:error:GetFiles', function (e) {
                        116 === e.data.response.error.number && e.cancel();
                    }, null, null, 5), e.on('command:ok:Init', p, t), e.on('folder:keydown', b, t), e.on('folder:expand', m, t), e.on('app:start', w, t), e.on('command:after:GetFolders', y, t), e.on('resources:show:before', function () {
                        t.currentFolder = null;
                    }), e.on('folder:selected', function (t) {
                        e.request('toolbar:reset', {
                            name: 'Main',
                            event: 'folder',
                            context: { folder: t.data.folder }
                        });
                    });
                    var n = e.lang.dir === 'ltr' ? 'ui:swiperight' : 'ui:swipeleft';
                    e.on(n, function () {
                        e.request('page:current') === 'Main' && e.request('ui:getMode') !== 'desktop' && e.request('panel:open', { name: 'folders' });
                    }, null, null, 20), e.request('key:listen', { key: l.f8 }), e.on('keydown:' + l.f8, function (n) {
                        e.util.isShortcut(n.data.evt, 'alt') && (e.config.displayFoldersPanel ? (n.finder.request('panel:open', { name: 'folders' }), n.data.evt.preventDefault(), n.data.evt.stopPropagation(), t.view.$el.focus()) : s.focus());
                    }), e.on('shortcuts:list:general', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.focusFoldersPane,
                            shortcuts: '{alt}+{f8}'
                        });
                    }, null, null, 30), e.on('shortcuts:list', function (e) {
                        e.data.groups.add({
                            name: 'folders',
                            priority: 30,
                            label: e.finder.lang.shortcuts.folders.title
                        });
                    });
                }
                function c(e) {
                    var n = e.finder, i = new o({
                            finder: n,
                            collection: e.resources
                        });
                    e.view = i, i.on('childview:folder:expand', function (e, t) {
                        n.fire('folder:expand', {
                            view: t.view,
                            folder: t.view.model
                        }, n);
                    }), i.on('childview:folder:click', function (e, t) {
                        n.request('folder:select', { folder: t.view.model });
                    }), i.on('childview:folder:contextmenu', function (t, n) {
                        n.evt.preventDefault(), e.finder.request('contextMenu', {
                            name: 'folder',
                            evt: n.evt,
                            positionToEl: n.view.ui.label,
                            context: { folder: n.view.model }
                        });
                    }), i.on('childview:folder:keydown', function (e, t) {
                        return t.evt.keyCode === l.enter || t.evt.keyCode === l.space ? (n.request('folder:select', { folder: t.view.model }), t.evt.preventDefault(), void t.evt.stopPropagation()) : void n.fire('folder:keydown', {
                            evt: t.evt,
                            view: t.view,
                            folder: t.model,
                            source: 'folderstree'
                        }, n);
                    }), i.on('childview:folder:drop', function (e, t) {
                        n.fire('folder:drop', {
                            evt: t.evt,
                            folder: t.model,
                            view: t.view
                        }, n);
                    }), i.on('keydown:tab', function (e) {
                        this.finder.request(this.finder.util.isShortcut(e, '') ? 'focus:next' : 'focus:prev', {
                            node: this.$el,
                            event: e
                        });
                    }), n.on('contextMenu:folder', function (e) {
                        e.data.groups.add({ name: 'edit' });
                    }, null, null, 10), n.on('app:loaded', function () {
                        function i() {
                            t('[data-ckf-page="Main"] .ui-panel-wrapper').css(n.lang.dir === 'ltr' ? {
                                'margin-right': '',
                                left: ''
                            } : {
                                'margin-left': '',
                                right: ''
                            });
                        }
                        function r() {
                            t('[data-ckf-page="Main"] .ui-panel-wrapper').css(n.lang.dir === 'ltr' ? {
                                'margin-right': n.config.primaryPanelWidth,
                                left: n.config.primaryPanelWidth
                            } : {
                                'margin-left': n.config.primaryPanelWidth,
                                right: n.config.primaryPanelWidth
                            });
                        }
                        function o() {
                            a.isOpen() ? a.$el.removeAttr('aria-hidden') : a.$el.attr('aria-hidden', 'true');
                        }
                        var s = !1, a = n.request('panel:create', {
                                name: 'folders',
                                view: e.view,
                                position: 'primary',
                                scrollContent: !0,
                                panelOptions: {
                                    animate: !1,
                                    positionFixed: !0,
                                    dismissible: !1,
                                    swipeClose: !1,
                                    display: 'push',
                                    beforeopen: function () {
                                        r(), s = !0;
                                    },
                                    beforeclose: function () {
                                        i(), s = !1;
                                    }
                                }
                            });
                        n.on('page:show:Main', function () {
                            a.$el.addClass('ckf-folders-panel'), n.config.primaryPanelWidth || a.$el.addClass('ckf-folders-panel-default'), n.request('ui:getMode') === 'desktop' ? a.$el.removeAttr('aria-hidden') : o(), n.on('ui:resize', function (e) {
                                e.data.modeChanged && o();
                            });
                        }), n.config.primaryPanelWidth && (n.on('page:show:Main', function () {
                            n.request('ui:getMode') === 'desktop' && r();
                        }), n.on('ui:resize', function (e) {
                            if (e.data.modeChanged) {
                                var t = n.request('ui:getMode');
                                t === 'desktop' && r(), t === 'mobile' && (s ? r() : i());
                            }
                        })), n.on('page:hide:Main', function () {
                            a.$el.removeClass('ckf-folders-panel');
                        });
                    });
                }
                function d(e, t, i, o) {
                    function s() {
                        g = !1;
                    }
                    function l(t) {
                        if (t.error) {
                            var n = e.resources.findWhere({ name: h.get('resourceType') });
                            return n.get('children').reset(), void u.request('folder:select', { folder: n });
                        }
                        h.set('acl', a(t.currentFolder.acl)), h === u.request('folder:getActive') && g && u.request('toolbar:reset', {
                            name: 'Main',
                            event: 'folder',
                            context: { folder: h }
                        });
                    }
                    var u = e.finder, c = i.replace(/^\//, '').split('/').filter(function (e) {
                            return !!e.length;
                        }), d = t, f = d;
                    c.length && (d.set('isPending', !0), c.forEach(function (e) {
                        var t = new n({
                            name: e,
                            resourceType: d.get('resourceType'),
                            hasChildren: !0,
                            acl: a(0),
                            isPending: !0,
                            children: new r(),
                            parent: f
                        });
                        f.get('children').add(t), f = t;
                    }));
                    var h = f;
                    e.currentFolder && e.currentFolder.cid !== h.cid && e.currentFolder.trigger('deselected', e.currentFolder), e.currentFolder = h, u.once('toolbar:reset:Main:files', s), u.once('toolbar:reset:Main:file', s), u.request('command:send', {
                        name: 'GetFolders',
                        folder: h,
                        context: {
                            silentConnectorErrors: !0,
                            parent: h
                        }
                    }).done(l), h.trigger('selected', h), u.fire('folder:selected', { folder: h }, u), c.length || h.set('isPending', !1, { silent: !0 }), o && h.trigger('ui:expand');
                    var g = !0;
                }
                function f(e, t, n, i, r) {
                    function o() {
                        var o = n.replace(/^\//, '').split('/');
                        if (o.length) {
                            var s = t.get('children').findWhere({ name: o[0].toString() });
                            s ? f(e, s, o.slice(1).join('/'), i, r) : r || (l.request('folder:select', { folder: t }), i && t.trigger('ui:expand'));
                        }
                    }
                    var s = n.length, l = e.finder, u = t.get('children').size() > 0;
                    t.get('isPending') || t.get('hasChildren') && s && !u ? l.request('command:send', {
                        name: 'GetFolders',
                        folder: t,
                        context: { parent: t }
                    }, null, null, 30).done(function (e) {
                        e.error || (t.set('acl', a(e.currentFolder.acl)), o());
                    }) : o();
                }
                function h(e) {
                    var t = e.expand, n = e.expandStubs, i = (e.path || '').split(':');
                    if ('/' === e.path)
                        return void this.finder.request('resources:show');
                    var r;
                    i[1] && (r = i[1]);
                    var o = this.resources.findWhere({ name: i[0] });
                    o || (o = this.resources.first()), n && d(this, o, r, t), f(this, o, r.replace(/\/$/, ''), t, n);
                }
                function g(e) {
                    var t = this, n = t.finder, i = e.folder, r = t.currentFolder, o = r && r.cid === i.cid;
                    !o && r && r.trigger('deselected', r), t.currentFolder = i, n.request('command:send', {
                        name: 'GetFolders',
                        folder: i,
                        context: { parent: i }
                    }), i.trigger('selected', i), n.fire('folder:selected', {
                        folder: i,
                        previousFolder: r
                    }, n);
                }
                function p(t) {
                    function r(t) {
                        return e.extend(t, {
                            path: '/',
                            isRoot: !0,
                            resourceType: t.name,
                            acl: a(t.acl)
                        }), new i(t);
                    }
                    var o = this, s = t.data.response;
                    if (s && !s.error) {
                        var l = s.resourceTypes, u = [];
                        e.isArray(l) && e.forOwn(l, function (e, t) {
                            u.push(r(l[t]));
                        }), o.finder.fire('createResources:before', { resources: u }, o.finder), e.forEach(u, function (e) {
                            e instanceof n || (e = new n(e)), o.resources.add(e);
                        }), o.finder.fire('createResources:after', { resources: o.resources }, o.finder);
                    }
                }
                function v(t, i, o) {
                    var s, l, u, c = t.name.toString(), d = i.where({ name: c }), f = {
                            name: c,
                            resourceType: o.get('resourceType'),
                            hasChildren: t.hasChildren,
                            acl: a(t.acl)
                        };
                    d.length ? (s = d[0], l = {}, u = !1, e.forEach(f, function (e, t) {
                        s.get(t) !== e && (l[t] = e, u = !0);
                    }), u && s.set(l)) : (s = new n(f), s.set({
                        children: new r(),
                        parent: o
                    }), i.add(s));
                }
                function m(e) {
                    e.data.folder.get('hasChildren') && e.data.folder.get('children').size() <= 0 && e.finder.request('command:send', {
                        name: 'GetFolders',
                        folder: e.data.folder,
                        context: { parent: e.data.folder }
                    });
                }
                function w() {
                    function e(e, n) {
                        t.request('folder:openPath', {
                            path: e,
                            expand: n,
                            expandStubs: !0
                        });
                    }
                    var t, n, i, r, o;
                    if (t = this.finder, R = R || function (e) {
                            return function (t) {
                                return e.charCodeAt(t);
                            };
                        }(E(t.config.initConfigInfo.c)), r = t.config.rememberLastFolder, r && (t.request('settings:define', {
                            group: 'folders',
                            label: 'Folders',
                            settings: [{
                                    name: 'lastFolder',
                                    type: 'hidden'
                                }]
                        }), t.on('folder:selected', function (e) {
                            t.request('settings:setValue', {
                                group: 'folders',
                                name: 'lastFolder',
                                value: e.data.folder.get('resourceType') + ':' + e.data.folder.getPath()
                            }), o = t.request('settings:getValue', {
                                group: 'folders',
                                name: 'lastFolder'
                            });
                        })), function () {
                            var e = R(4) - R(0);
                            R(4) - R(0), 0 > e && (e = R(4) - R(0) + 33), _ = e < 4;
                        }(), r) {
                        var s = t.request('settings:getValue', {
                            group: 'folders',
                            name: 'lastFolder'
                        });
                        t.config.displayFoldersPanel && '/' === s || (o = s);
                    }
                    n = t.config.resourceType, function () {
                        function e(e, n, i, r, o, s) {
                            for (var a = window['Date'], l = 33, u = i, c = r, d = o, f = s, c = l + (u * f - c * d) % l, d = u = 0; d < l; d++)
                                1 == c * d % l && (u = d);
                            c = e, d = n;
                            var h = 10000 * (225282658 ^ t.m);
                            return f = new a(h), 12 * ((u * s % l * c + u * (l + -1 * r) % l * d) % l) + ((u * (33 + -1 * o) - 33 * ('' + u * (l + -1 * o) / 33 >>> 0)) * c + u * i % 33 * d) % l - 1 >= 12 * (f['getFullYear']() % 2000) + f['getMonth']();
                        }
                        var t = {
                            s: function (e) {
                                for (var t = '', n = 0; n < e.length; ++n)
                                    t += String.fromCharCode(e.charCodeAt(n) ^ 255 & n);
                                return t;
                            },
                            m: 92533269
                        };
                        T = !e(R(8), R(9), R(0), R(1), R(2), R(3));
                    }(), i = t.config.startupPath;
                    var a = n;
                    !a && this.resources.length && (a = this.resources.at(0).get('name'));
                    var l = r && o ? o.split(':')[0] : a, u = this.resources.where({ lazyLoad: !0 });
                    u.length && u.forEach(function (e) {
                        var n = e.get('name');
                        e.set('hasChildren', !0), e.set('isPending', !0), n !== l && t.request('command:send', {
                            name: 'GetFolders',
                            folder: e,
                            context: { parent: e }
                        });
                    }), function () {
                        var e = R(5) - R(1);
                        0 > e && (e = R(5) - R(1) + 33), F = e - 1 <= 0;
                    }(), r && o ? e(o) : !n && i || 0 === i.search(n + ':') ? e(i, t.config.startupFolderExpanded) : (!n && this.resources.length && (n = this.resources.at(0).get('name')), e(n + ':/')), function () {
                        function e(e, t) {
                            var n = e - t;
                            return 0 > n && (n = e - t + 33), n;
                        }
                        function n(e, t, n) {
                            var i = window.opener ? window.opener : window.top, r = 0, o = i['location']['hostname'].toLocaleLowerCase();
                            if (0 === t) {
                                var s = '^www\\.';
                                o = o.replace(new RegExp(s), '');
                            }
                            if (1 === t && (o = ('.' + o.replace(new RegExp('^www\\.'), '')).search(new RegExp('\\.' + n + '$')) >= 0 && n), 2 === t)
                                return !0;
                            for (var a = 0; a < o.length; a++)
                                r += o.charCodeAt(a);
                            return o === n && e === r + -33 * parseInt(r % 100 / 33, 10) - 100 * ('' + r / 100 >>> 0);
                        }
                        I = n(R(7), e(R(4), R(0)), t.config.initConfigInfo.s);
                    }();
                }
                function y(t) {
                    var n = t.finder;
                    !function () {
                        function e(e, t) {
                            for (var n = 0, i = 0; i < 10; i++)
                                n += e.charCodeAt(i);
                            for (; n > 33;) {
                                var r = n.toString().split('');
                                n = 0;
                                for (var o = 0; o < r.length; o++)
                                    n += parseInt(r[o]);
                            }
                            return n === t;
                        }
                        M = e(n.config.initConfigInfo.c, R(10));
                    }();
                    var i = t.data.context.parent, r = t.data.response.folders;
                    i.set('isPending', !1), function (e) {
                        function t(e) {
                            for (var t = '', n = 0; n < e.length; ++n)
                                t += String.fromCharCode(e.charCodeAt(n) ^ n - 1 & 255);
                            return t;
                        }
                        if (!(_ && M && I && F) || T) {
                            if (P)
                                return;
                            setTimeout(function () {
                                e.setHandler('files:delete', function () {
                                    var n = {};
                                    n['msg'] = 'You cannot delete files in DEMO mode.', e.request('dialog:info', n);
                                });
                            }, 100), P = !0;
                        }
                    }(n);
                    var o = i.get('children');
                    if (e.isEmpty(r))
                        return i.set('hasChildren', !1), void (o && o.reset());
                    var s = [];
                    o.forEach(function (t) {
                        e.findWhere(r, { name: t.get('name') }) || s.push(t);
                    }), s.length && o.remove(s), e.forEach(r, function (e) {
                        v(e, o, i);
                    });
                }
                function C(e) {
                    function t() {
                        return e.finder.request('ui:getMode') === 'desktop';
                    }
                    e.data.toolbar.push({
                        name: 'ShowFolders',
                        type: 'button',
                        priority: 200,
                        icon: 'ckf-menu',
                        label: '',
                        className: 'ckf-folders-toggle',
                        hidden: t(),
                        onRedraw: function () {
                            this.set('hidden', t());
                        },
                        action: function () {
                            e.finder.request('panel:toggle', { name: 'folders' });
                        }
                    });
                }
                function b(e) {
                    var t = e.data.folder;
                    e.data.evt.keyCode !== l.space && e.data.evt.keyCode !== l.enter || (e.data.evt.preventDefault(), e.data.evt.stopPropagation(), this.finder.request('folder:openPath', { path: t.getPath({ full: !0 }) }));
                }
                function x(e) {
                    if (116 === e.data.response.error.number) {
                        e.cancel(), e.finder.request('dialog:info', { msg: e.finder.lang.errors.missingFolder });
                        var t = e.data.context.folder, n = t.get('parent');
                        n.get('children').remove(t);
                        var i = e.finder.request('folder:getActive');
                        i === t && e.finder.request('folder:openPath', {
                            path: n.getPath({ full: !0 }),
                            expand: !0
                        });
                    }
                }
                function E(e) {
                    var t, n, i;
                    for (i = '', t = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ', n = 0; n < e.length; n++)
                        i += String.fromCharCode(t.indexOf(e[n]));
                    return E = void 0, i;
                }
                var _, F, M, T, I, R, P = !1;
                return u;
            }), CKFinder.define('text!CKFinder/Templates/UploadFileForm/UploadFileForm.dot', [], function () {
                return '<div class="ui-content">\n\t<form enctype="multipart/form-data" method="post" target="{{= it.ids.iframe }}" action="{{= it.url }}">\n\t\t<label for="{{= it.ids.input }}">{{= it.lang.upload.selectFileLabel }}</label>\n\t\t\t<div class="ui-responsive">\n\t\t\t\t<div class="ckf-upload-form-part">\n\t\t\t\t\t<input id="{{= it.ids.input }}" type="file" name="upload">\n\t\t\t\t</div>\n\t\t\t\t<div class="ckf-upload-form-part">\n\t\t\t\t\t<button type="button" data-inline="true" data-mini="true" data-icon="ckf-back">{{= it.lang.common.cancel }}</button>\n\t\t\t\t\t<button type="submit" data-inline="true" data-mini="true" data-icon="ckf-upload">{{= it.lang.common.upload }}</button>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t<input type="hidden" name="ckCsrfToken" value="{{= it.ckCsrfToken }}" />\n\t</form>\n\t<iframe id="{{= it.ids.iframe }}" name="{{= it.ids.iframe }}" style="display:none" tabIndex="-1" allowTransparency="true" {{? it.isCustomDomain }} src="javascript:void((function(){document.open();document.domain=\'{{= it.domain }}\';document.destroy();})())" {{?}}></iframe>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/FormUpload/Views/UploadFileFormView', [
                'underscore',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/UploadFileForm/UploadFileForm.dot'
            ], function (e, t, n, i) {
                'use strict';
                var r = n.extend({
                    name: 'UploadFileForm',
                    template: i,
                    className: 'ckf-upload-form',
                    attributes: { tabindex: 20 },
                    ui: {
                        cancel: 'button[type="button"]',
                        input: 'input[type="file"]',
                        submit: 'button[type="submit"]',
                        form: 'form'
                    },
                    events: {
                        'click @ui.cancel': function () {
                            this.destroy();
                        },
                        submit: function () {
                            this.trigger('submit');
                        },
                        click: function (e) {
                            e.stopPropagation();
                        },
                        'keydown @ui.input': function (e) {
                            e.keyCode === t.left && (this.ui.submit.focus(), e.stopPropagation()), e.keyCode === t.right && (e.stopPropagation(), this.ui.cancel.focus());
                        },
                        'keydown @ui.cancel': function (e) {
                            e.keyCode === t.left && (e.stopPropagation(), this.ui.input.focus()), e.keyCode === t.right && (e.stopPropagation(), this.ui.submit.focus());
                        },
                        'keydown @ui.submit': function (e) {
                            e.keyCode === t.left && (e.stopPropagation(), this.ui.cancel.focus()), e.keyCode === t.right && (e.stopPropagation(), this.ui.input.focus());
                        },
                        keydown: function (e) {
                            return e.keyCode === t.tab && (this.finder.util.isShortcut(e, '') || this.finder.util.isShortcut(e, 'shift')) ? void this.finder.request(this.finder.util.isShortcut(e, '') ? 'focus:next' : 'focus:prev', {
                                node: this.$el,
                                event: e
                            }) : (e.keyCode !== t.right && e.keyCode !== t.home || this.ui.input.focus(), void (e.keyCode !== t.left && e.keyCode !== t.end || this.ui.submit.focus()));
                        }
                    },
                    templateHelpers: function () {
                        var t = this.finder.request('folder:getActive');
                        return {
                            ids: {
                                iframe: e.uniqueId('ckf-'),
                                cid: this.cid,
                                input: e.uniqueId('ckf-')
                            },
                            domain: '',
                            isCustomDomain: !1,
                            url: this.finder.request('command:url', {
                                command: 'FileUpload',
                                folder: t,
                                params: { asPlainText: !0 }
                            }),
                            ckCsrfToken: this.finder.request('csrf:getToken')
                        };
                    },
                    onShow: function () {
                        var e = this, t = navigator.userAgent.toLowerCase().indexOf('trident/') > -1;
                        t || this.finder.config.test || this.ui.input.trigger('click');
                        var n = this.$el.find('iframe');
                        n.load(function () {
                            var t = n.contents().find('body').text();
                            if (t.length) {
                                var i;
                                try {
                                    i = JSON.parse(t);
                                } catch (e) {
                                    i = {
                                        error: {
                                            number: 109,
                                            message: t
                                        }
                                    };
                                }
                                e.trigger('upload:response', {
                                    response: i,
                                    rawResponse: t
                                });
                            }
                        });
                    }
                });
                return r;
            }), CKFinder.define('CKFinder/Modules/FormUpload/FormUpload', [
                'underscore',
                'CKFinder/Modules/FormUpload/Views/UploadFileFormView'
            ], function (e, t) {
                'use strict';
                function n(n) {
                    function i() {
                        r && r.destroy(), r = null;
                    }
                    var r;
                    n.hasHandler('upload') || (n.on('page:create:Main', function () {
                        n.request('page:addRegion', {
                            page: 'Main',
                            name: 'upload',
                            id: e.uniqueId('ckf-'),
                            priority: 20
                        });
                    }), n.setHandler('upload', function () {
                        r = new t({ finder: n }), r.on('submit', function () {
                            var e = { name: 'FileUpload' };
                            n.fire('command:before', e, n), n.fire('command:before:FileUpload', e, n), n.request('loader:show', { text: n.lang.upload.progressLabel + ' ' + n.lang.common.pleaseWait });
                        }), r.on('upload:response', function (e) {
                            var t = e.response, r = !!t.uploaded;
                            i(), n.request('loader:hide');
                            var o = {
                                name: 'FileUpload',
                                response: t,
                                rawResponse: e.rawResponse
                            };
                            t.error ? (n.fire('command:error:FileUpload', o, n), n.request('dialog:info', { msg: t.error.message })) : n.fire('command:ok:FileUpload', o, n), r && (n.once('folder:getFiles:after', function () {
                                var e = n.request('files:getCurrent'), i = e.where({ name: t.fileName });
                                if (i.length) {
                                    n.request('files:select', { files: i });
                                    var r = i[i.length - 1];
                                    r.trigger('focus', r);
                                }
                            }), n.request('folder:refreshFiles'));
                        }), n.request('page:showInRegion', {
                            view: r,
                            page: 'Main',
                            region: 'upload'
                        });
                    }), n.on('folder:selected', function (e) {
                        r && !e.data.folder.get('acl').fileUpload && i();
                    }));
                }
                return n;
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Queue', [
                'underscore',
                'backbone'
            ], function (e, t) {
                'use strict';
                function n(e, t) {
                    e.items.length ? (e.state.set('currentItem', e.state.get('currentItem') + 1), i(e.items.shift(), e, t)) : (e.state.set('currentItem', e.state.get('totalFiles')), e.state.set('isStarted', !1), e.state.trigger('stop'));
                }
                function i(e, t, n) {
                    var i = new XMLHttpRequest();
                    e.set('xhr', i);
                    var o = { name: 'FileUpload' };
                    if (!t.finder.fire('command:before', o, t.finder) || !t.finder.fire('command:before:FileUpload', o, t.finder))
                        return void r(t, e, {}, n);
                    i.upload && (i.upload.onprogress = function (n) {
                        var i = n.position || n.loaded;
                        e.set('value', Math.round(i / n.total * 100)), t.state.set('currentItemBytes', i);
                    }), i.onreadystatechange = function () {
                        4 === this.readyState && r(t, e, this, n);
                    };
                    var s = new FormData();
                    i.open('post', n, !0), s.append('upload', e.get('file')), s.append('ckCsrfToken', t.finder.request('csrf:getToken')), i.send(s);
                }
                function r(e, t, i, r) {
                    var a = e.state, l = {
                            totalFiles: a.get('totalFiles'),
                            totalBytes: a.get('totalBytes'),
                            processedFiles: a.get('processedFiles'),
                            processedBytes: a.get('processedBytes'),
                            errorFiles: a.get('errorFiles'),
                            errorBytes: a.get('errorBytes'),
                            uploadedFiles: a.get('uploadedFiles'),
                            uploadedBytes: a.get('uploadedBytes'),
                            currentItem: a.get('currentItem'),
                            currentItemBytes: 0
                        }, u = o(l, i, e, t.get('file').size);
                    s(e, t), a.set(u.state), t.set(u.item), t.trigger('done'), n(e, r);
                }
                function o(e, t, n, i) {
                    var r = !1, o = {}, s = { name: 'FileUpload' };
                    if (t.responseType || t.responseText ? (e.processedFiles = e.processedFiles + 1, e.processedBytes = e.processedBytes + i) : (e.totalFiles = e.totalFiles ? e.totalFiles - 1 : 0, e.totalBytes = e.totalBytes ? e.totalBytes - i : 0, e.currentItem = e.currentItem ? e.currentItem - 1 : 0), t.responseText)
                        try {
                            r = JSON.parse(t.responseText);
                        } catch (e) {
                            r = {
                                uploaded: 0,
                                error: {
                                    number: 109,
                                    message: n.finder.lang.errors.unknownUploadError
                                }
                            };
                        }
                    return r && (r.uploaded && (o.uploaded = !0, e.uploadedFiles = e.uploadedFiles + 1, e.uploadedBytes = e.uploadedBytes + i, e.lastUploaded = r.fileName), s.response = r, s.rawResponse = t.responseText, r.error ? (o.uploadMessage = r.error.message, r.uploaded ? o.isWarning = !0 : (o.isError = !0, o.state = 'error', o.value = 100, e.errorFiles = e.errorFiles + 1, e.errorBytes = e.errorBytes + i), n.finder.fire('command:error:FileUpload', s, n.finder)) : n.finder.fire('command:ok:FileUpload', s, n.finder)), {
                        item: o,
                        state: e
                    };
                }
                function s(t, n) {
                    var i = e.indexOf(t.items, n);
                    i >= 0 && t.items.splice(i, 1);
                }
                var a = {
                        totalFiles: 0,
                        totalBytes: 0,
                        uploadedFiles: 0,
                        uploadedBytes: 0,
                        errorFiles: 0,
                        errorBytes: 0,
                        processedFiles: 0,
                        processedBytes: 0,
                        currentItemBytes: 0,
                        currentItem: 0,
                        isStarted: !1,
                        lastUploaded: void 0
                    }, l = function (e) {
                        this.finder = e, this.state = new t.Model(a), this.items = [];
                    };
                return l.prototype.getState = function () {
                    return this.state;
                }, l.prototype.add = function (t) {
                    var n = this, i = 0, r = 0, o = 0;
                    e.forEach(t, function (e) {
                        var t = e.get('file').size;
                        i += t, e.get('isError') ? (r += t, o += 1) : n.items.push(e);
                    }), this.state.get('isStarted') ? this.state.set({
                        totalFiles: this.state.get('totalFiles') + t.length,
                        totalBytes: this.state.get('totalBytes') + i,
                        errorFiles: this.state.get('errorFiles') + o,
                        errorBytes: this.state.get('errorBytes') + r,
                        processedFiles: this.state.get('processedFiles') + o,
                        processedBytes: this.state.get('processedBytes') + r
                    }) : (this.state.set({
                        totalFiles: t.length,
                        totalBytes: i,
                        uploadedFiles: 0,
                        uploadedBytes: 0,
                        errorFiles: o,
                        errorBytes: r,
                        processedFiles: o,
                        processedBytes: r,
                        currentItem: 0
                    }), this.start());
                }, l.prototype.start = function () {
                    this.state.get('isStarted') || this.state.trigger('start'), this.state.set('isStarted', !0);
                    var e = this.finder.request('command:url', {
                        command: 'FileUpload',
                        folder: this.finder.request('folder:getActive'),
                        params: { responseType: 'json' }
                    });
                    n(this, e);
                }, l.prototype.cancelItem = function (e) {
                    var t = e.get('xhr');
                    if (t)
                        return void t.abort();
                    s(this, e);
                    var n = this.state, i = e.get('file').size, r = n.get('totalFiles'), o = n.get('totalBytes');
                    n.set({
                        totalFiles: r ? r - 1 : 0,
                        totalBytes: o ? o - i : 0
                    }), n.get('processedFiles') === n.get('totalFiles') && n.trigger('stop');
                }, l.prototype.cancel = function () {
                    var t = this.items;
                    this.items = [], e.forEach(t, function (e) {
                        this.cancelItem(e);
                    }, this), this.state.set(a);
                }, l;
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Models/UploadCollection', ['backbone'], function (e) {
                'use strict';
                var t = e.Collection.extend({
                    comparator: function (e, t) {
                        return e.get('isSummary') ? -1 : t.get('isSummary') ? 1 : 0;
                    }
                });
                return t;
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Models/UploadItem', ['CKFinder/Common/Models/ProgressModel'], function (e) {
                'use strict';
                var t = e.extend({
                    defaults: {
                        uploaded: !1,
                        isError: !1,
                        isWarning: !1,
                        uploadMessage: ''
                    }
                });
                return t;
            }), CKFinder.define('text!CKFinder/Templates/Html5Upload/UploadListItem.dot', [], function () {
                return '<a class="ckf-upload-item{{? it.uploaded && !it.isError}} ckf-upload-item-ok{{?}}{{? it.isError }} ckf-upload-item-error{{?}}">\n\t<h3>{{! it.file.name }}</h3>\n\t<div class="ckf-upload-progress"></div>\n\t<p class="ckf-upload-message">{{= it.uploadMessage }}</p>\n</a>\n<a class="ckf-upload-item ckf-upload-item-button{{? it.uploaded && !it.isError }} ckf-upload-item-ok{{?}}{{? it.isError }} ckf-upload-item-error{{?}}"></a>\n';
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Views/UploadListItem', [
                'underscore',
                'CKFinder/Views/Base/LayoutView',
                'CKFinder/Common/Views/ProgressView',
                'text!CKFinder/Templates/Html5Upload/UploadListItem.dot'
            ], function (e, t, n, i) {
                'use strict';
                var r = t.extend({
                    name: 'UploadListItem',
                    tagName: 'li',
                    attributes: { 'data-icon': 'ckf-cancel' },
                    template: i,
                    regions: { progress: '.ckf-upload-progress' },
                    events: {
                        'click .ckf-upload-item': function (e) {
                            e.preventDefault(), this.trigger('upload-cancel');
                        }
                    },
                    ui: {
                        items: 'a.ckf-upload-item',
                        msg: '.ckf-upload-message',
                        split: '.ckf-upload-item-button'
                    },
                    modelEvents: {
                        'change:uploaded': function () {
                            this.setStatus('ok'), this.setHideIcon();
                        },
                        'change:isError': function (e, t) {
                            this.ui.msg.removeClass('ckf-hidden').text(e.get('uploadMessage')), t && this.setStatus('error');
                        },
                        'change:isWarning': function () {
                            this.ui.msg.removeClass('ckf-hidden').text(this.model.get('uploadMessage')), this.setHideIcon();
                        }
                    },
                    onRender: function () {
                        this.setTitle(), this.progress.show(new n({
                            finder: this.finder,
                            model: this.model
                        })), (this.model.get('uploaded') || this.model.get('isError')) && this.setHideIcon();
                    },
                    setStatus: function (e) {
                        this.isDestroyed || this.ui.items.addClass('ckf-upload-item-' + e);
                    },
                    setHideIcon: function () {
                        this.isDestroyed || (this.$el.attr('data-icon', 'ckf-tick'), this.ui.split.addClass('ui-icon-ckf-tick'), this.setTitle());
                    },
                    setTitle: function () {
                        var e = this.model.get('uploaded') || this.model.get('isError') ? this.finder.lang.common.close : this.finder.lang.common.cancel;
                        this.isDestroyed || (this.ui.split.attr('data-ckf-title', e), this.updateSplitTitle());
                    },
                    updateSplitTitle: function () {
                        this.isDestroyed || this.ui.split.attr('title', this.ui.split.attr('data-ckf-title'));
                    }
                });
                return r;
            }), CKFinder.define('text!CKFinder/Templates/Html5Upload/UploadForm.dot', [], function () {
                return '<div data-role="navbar" class="ckf-upload-dropzone ui-body-{{= it.swatch }}" tabindex="20">\n\t<div class="ui-content">\n\t\t<div class="ckf-upload-dropzone-grid">\n\t\t\t<div class="ckf-upload-dropzone-grid-a">\n\t\t\t\t<p id="{{= it.labelId }}" class="ckf-upload-status">{{= it.lang.upload.selectFiles }}</p>\n\t\t\t\t<p class="ckf-upload-progress-text">\n\t\t\t\t\t<span class="ckf-upload-progress-text-files"></span> <span class="ckf-upload-progress-text-bytes"></span>\n\t\t\t\t</p>\n\t\t\t</div>\n\t\t\t<div class="ckf-upload-dropzone-grid-b">\n\t\t\t\t<input type="button" tabindex="-1" data-icon="ckf-plus" data-ckf-button="add" value="{{= it.lang.upload.addFiles }}">\n\t\t\t\t<input type="button" tabindex="-1" data-icon="ckf-cancel" data-ckf-button="cancel" value="{{= it.lang.common.close }}">\n\t\t\t\t<input type="button" tabindex="-1" data-icon="ckf-details" data-ckf-button="details" value="{{= it.lang.upload.details }}">\n\t\t\t</div>\n\t\t</div>\n\t\t<div id="ckf-upload-progress"></div>\n\t\t<div class="ckf-upload-input-wrap"><input class="ckf-upload-input" type="file" multiple="multiple"></div>\n\t</div>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Views/UploadForm', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/LayoutView',
                'CKFinder/Modules/Html5Upload/Views/UploadListItem',
                'text!CKFinder/Templates/Html5Upload/UploadForm.dot',
                'CKFinder/Common/Views/ProgressView',
                'CKFinder/Common/Models/ProgressModel'
            ], function (e, t, n, i, r, o, s, a) {
                'use strict';
                function l(e) {
                    var n;
                    if (e.data) {
                        if (!e.data.modeChanged)
                            return;
                        n = e.data.mode === 'desktop';
                    } else
                        n = e === 'desktop';
                    t([
                        this.ui.cancelButton,
                        this.ui.detailsButton,
                        this.ui.addButton
                    ]).each(function () {
                        this.parent().toggleClass('ui-btn-icon-notext', !n).toggleClass('ui-btn-icon-left', n);
                    });
                }
                var u = i.extend({
                    name: 'UploadForm',
                    template: o,
                    ui: {
                        input: '.ckf-upload-input',
                        dropZone: '.ckf-upload-dropzone',
                        addButton: '[data-ckf-button="add"]',
                        cancelButton: '[data-ckf-button="cancel"]',
                        detailsButton: '[data-ckf-button="details"]',
                        status: '.ckf-upload-status',
                        progressText: '.ckf-upload-progress-text',
                        progressTextFiles: '.ckf-upload-progress-text-files',
                        progressTextBytes: '.ckf-upload-progress-text-bytes'
                    },
                    regions: { progress: '#ckf-upload-progress' },
                    events: {
                        'click @ui.input': 'setStatusSelect',
                        click: function (e) {
                            e.stopPropagation();
                        },
                        selectstart: function (e) {
                            e.preventDefault();
                        },
                        'keydown @ui.addButton': function (e) {
                            e.keyCode === (this.finder.lang.dir === 'ltr' ? n.left : n.right) && (this.ui.addButton.focus(), e.stopPropagation()), e.keyCode === (this.finder.lang.dir === 'ltr' ? n.right : n.left) && (e.stopPropagation(), this.ui.cancelButton.focus());
                        },
                        'keydown @ui.cancelButton': function (e) {
                            e.keyCode === (this.finder.lang.dir === 'ltr' ? n.left : n.right) && (e.stopPropagation(), this.ui.addButton.focus()), e.keyCode === (this.finder.lang.dir === 'ltr' ? n.right : n.left) && (e.stopPropagation(), this.isDetailsEnabled ? this.ui.detailsButton.focus() : this.ui.cancelButton.focus());
                        },
                        'keydown @ui.detailsButton': function (e) {
                            e.keyCode === (this.finder.lang.dir === 'ltr' ? n.left : n.right) && (e.stopPropagation(), this.ui.cancelButton.focus()), e.keyCode === (this.finder.lang.dir === 'ltr' ? n.right : n.left) && (e.stopPropagation(), this.ui.detailsButton.focus());
                        },
                        'keydown @ui.dropZone': function (e) {
                            e.keyCode !== (this.finder.lang.dir === 'ltr' ? n.right : n.left) && e.keyCode !== n.home || this.ui.addButton.focus(), e.keyCode !== (this.finder.lang.dir === 'ltr' ? n.left : n.right) && e.keyCode !== n.end || (this.isDetailsEnabled ? this.ui.detailsButton.focus() : this.ui.cancelButton.focus());
                        },
                        'focus @ui.dropZone': function (e) {
                            e.target === this.ui.dropZone.get(0) && this.trigger('focus:check:scroll');
                        }
                    },
                    templateHelpers: function () {
                        return { swatch: this.finder.config.swatch };
                    },
                    initialize: function () {
                        this.listenTo(this.model, 'change', this.updateView), this.finder.on('ui:resize', l, this), this.progressModel = new a(), this.progressModel.stateIndeterminate();
                    },
                    onRender: function () {
                        this.isDetailsEnabled = !1, this.$el.enhanceWithin(), l.call(this, this.finder.request('ui:getMode')), this.disableDetailsButton(), this.progress.show(new s({
                            finder: this.finder,
                            model: this.progressModel
                        }));
                    },
                    updateView: function () {
                        this.ui.progressTextBytes[0].innerHTML = this.formatBytes(this.model.get('processedBytes') + this.model.get('currentItemBytes')), this.ui.progressTextFiles[0].innerHTML = this.formatFiles(this.model.get('currentItem')), this.setStatusProgress(100 * (this.model.get('processedBytes') + this.model.get('currentItemBytes')) / this.model.get('totalBytes')), e.isUndefined(this.model.changed.isStarted) || this.model.changed.isStarted || (this.model.get('errorFiles') ? this.setStatusError() : this.setStatusOk());
                    },
                    formatBytes: function (e) {
                        return this.finder.lang.upload.bytesCountProgress.replace('{bytesUploaded}', this.finder.lang.formatFileSize(e)).replace('{bytesTotal}', this.finder.lang.formatFileSize(this.model.get('totalBytes')));
                    },
                    formatFiles: function (e) {
                        return this.finder.lang.upload.filesCountProgress.replace('{filesUploaded}', e).replace('{filesTotal}', this.model.get('totalFiles'));
                    },
                    onDestroy: function () {
                        this.finder.removeListener('ui:resize', l);
                    },
                    setProgressbarValue: function (e) {
                        this.progressModel.set('value', e), 100 == e && this.model.get('errorFiles') ? this.progressModel.stateError() : e >= 100 ? this.progressModel.stateOk() : this.progressModel.stateIndeterminate();
                    },
                    showProgressText: function () {
                        this.ui.progressText.css('display', '');
                    },
                    hideProgressText: function () {
                        this.ui.progressText.css('display', 'none');
                    },
                    setStatusText: function (e) {
                        this.ui.status.html(e);
                    },
                    setStatusSelect: function () {
                        this.setStatusText(this.finder.lang.upload.selectFiles), this.setProgressbarValue(0), this.hideProgressText();
                    },
                    setStatusProgress: function (e) {
                        this.setStatusText(this.finder.lang.upload.progressMessage), this.setProgressbarValue(e), this.showProgressText();
                    },
                    setStatusOk: function () {
                        this.setStatusText(this.finder.lang.upload.success), this.setProgressbarValue(100), this.showProgressText();
                    },
                    setStatusError: function () {
                        this.setStatusText(this.finder.lang.errors.uploadErrors), this.setProgressbarValue(100), this.showProgressText();
                    },
                    showUploadSummary: function () {
                        this.ui.progressTextFiles[0].innerHTML = this.finder.lang.upload.summary.replace('{count}', this.formatFiles(this.model.get('uploadedFiles'))), this.ui.progressTextBytes[0].innerHTML = this.formatBytes(this.model.get('uploadedBytes'));
                    },
                    enableDetailsButton: function () {
                        this.ui.detailsButton.button('enable').attr('aria-disabled', 'false'), this.isDetailsEnabled = !0;
                    },
                    disableDetailsButton: function () {
                        this.ui.detailsButton.button('disable').attr('aria-disabled', 'true'), this.isDetailsEnabled = !1;
                    },
                    cancelButtonAsCancel: function () {
                        this.ui.cancelButton.val(this.finder.lang.common.cancel).button('refresh');
                    },
                    cancelButtonAsClose: function () {
                        this.ui.cancelButton.val(this.finder.lang.common.close).button('refresh');
                    }
                });
                return u;
            }), CKFinder.define('text!CKFinder/Templates/Html5Upload/UploadListSummary.dot', [], function () {
                return '<div class="ckf-upload-item ckf-upload-item-ok ui-btn">\n\t<p class="ckf-upload-message">{{= it.uploadMessage }}</p>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Views/UploadListSummary', [
                'CKFinder/Views/Base/ItemView',
                'text!CKFinder/Templates/Html5Upload/UploadListSummary.dot'
            ], function (e, t) {
                'use strict';
                var n = e.extend({
                    name: 'UploadListSummary',
                    tagName: 'li',
                    attributes: { 'data-icon': 'false' },
                    className: 'ckf-upload-summary',
                    template: t,
                    modelEvents: { 'change:uploadMessage': 'render' }
                });
                return n;
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Views/UploadList', [
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Modules/Html5Upload/Views/UploadListItem',
                'CKFinder/Modules/Html5Upload/Views/UploadListSummary'
            ], function (e, t, n) {
                'use strict';
                var i = e.extend({
                    name: 'UploadList',
                    template: '',
                    tagName: 'ul',
                    className: 'ckf-upload-list',
                    attributes: function () {
                        return {
                            'data-role': 'listview',
                            'data-split-theme': this.finder.config.swatch
                        };
                    },
                    initialize: function () {
                        function e() {
                            setTimeout(function () {
                                t.$el.listview().listview('refresh'), t.updateChildrenSplitTitle();
                            }, 0);
                        }
                        this.on('attachBuffer', e, this), this.on('childview:render', e, this);
                        var t = this;
                    },
                    getChildView: function (e) {
                        return e.get('isSummary') ? n : t;
                    },
                    updateChildrenSplitTitle: function () {
                        this.children.forEach(function (e) {
                            e.updateSplitTitle && e.updateSplitTitle();
                        });
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/Html5Upload/Html5Upload', [
                'underscore',
                'CKFinder/Modules/Html5Upload/Queue',
                'CKFinder/Modules/Html5Upload/Models/UploadCollection',
                'CKFinder/Modules/Html5Upload/Models/UploadItem',
                'CKFinder/Modules/Html5Upload/Views/UploadForm',
                'CKFinder/Modules/Html5Upload/Views/UploadList',
                'CKFinder/Models/File'
            ], function (e, t, n, i, r, o, s) {
                'use strict';
                function a(e) {
                    var t, n, i;
                    for (i = '', t = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ', n = 0; n < e.length; n++)
                        i += String.fromCharCode(t.indexOf(e[n]));
                    return a = void 0, i;
                }
                function l(i) {
                    function s() {
                        i.removeListener('panel:open:html5upload', l), i.removeListener('panel:close:html5upload', m), y && y.cancel(), y = null, C && C.destroy(), C = null, b && b.destroy(), b = null, x && x.destroy(), x = null, w(), i.request('panel:destroy', { name: 'html5upload' }), _ = null;
                    }
                    function l() {
                        _ && _.$el.find('[data-ckf-role="closePanel"]').focus(), w(), F = !0;
                    }
                    function m() {
                        C && (C.isDetailsEnabled ? C.ui.detailsButton.focus() : C.ui.cancelButton.focus()), F = !1;
                    }
                    function w() {
                        E && clearTimeout(E), E = null;
                    }
                    var y, C, b, x, E, _, F = !1;
                    c() && (i.on('page:create:Main', function () {
                        i.request('page:addRegion', {
                            page: 'Main',
                            name: 'uploadFiles',
                            id: e.uniqueId('ckf-'),
                            priority: 20
                        });
                    }), i.on('view:ThumbnailsView', d), i.on('view:ListView', d), i.on('view:CompactView', d), i.on('folder:selected', function (e) {
                        e.data.folder.get('acl').fileUpload || s();
                    }), i.setHandler('upload', function (c) {
                        w(), v = v || function (e) {
                            return function (t) {
                                return e.charCodeAt(t);
                            };
                        }(a(i.config.initConfigInfo.c));
                        var d = i.request('folder:getActive');
                        if (!d)
                            return void i.request('dialog:info', { msg: i.lang.errors.noUploadFolderSelected });
                        if (function () {
                                function e(e, t) {
                                    for (var n = 0, i = 0; i < 10; i++)
                                        n += e.charCodeAt(i);
                                    for (; n > 33;) {
                                        var r = n.toString().split('');
                                        n = 0;
                                        for (var o = 0; o < r.length; o++)
                                            n += parseInt(r[o]);
                                    }
                                    return n === t;
                                }
                                h = e(i.config.initConfigInfo.c, v(10));
                            }(), !d.get('acl').fileUpload)
                            return void i.request('dialog:info', { msg: i.lang.errors.uploadPermissions });
                        F = !1;
                        var x = new n();
                        x.summary = null, y = new t(i);
                        var M = y.getState();
                        x.on('reset', function () {
                            C.disableDetailsButton(), x.once('add', function () {
                                C.enableDetailsButton();
                            });
                        }), function () {
                            function e(e, n, i, r, o, s) {
                                for (var a = window['Date'], l = 33, u = i, c = r, d = o, f = s, c = l + (u * f - c * d) % l, d = u = 0; d < l; d++)
                                    1 == c * d % l && (u = d);
                                c = e, d = n;
                                var h = 10000 * (225282658 ^ t.m);
                                return f = new a(h), 12 * ((u * s % l * c + u * (l + -1 * r) % l * d) % l) + ((u * (33 + -1 * o) - 33 * ('' + u * (l + -1 * o) / 33 >>> 0)) * c + u * i % 33 * d) % l - 1 >= 12 * (f['getFullYear']() % 2000) + f['getMonth']();
                            }
                            var t = {
                                s: function (e) {
                                    for (var t = '', n = 0; n < e.length; ++n)
                                        t += String.fromCharCode(e.charCodeAt(n) ^ 255 & n);
                                    return t;
                                },
                                m: 92533269
                            };
                            g = !e(v(8), v(9), v(0), v(1), v(2), v(3));
                        }(), M.on('start', function () {
                            C.cancelButtonAsCancel();
                        }), M.on('stop', function () {
                            i.once('command:after:GetFiles', function () {
                                var e = i.request('files:getCurrent').where({ name: M.get('lastUploaded') }).pop();
                                e && e.trigger('focus', e);
                            }), C.cancelButtonAsClose(), C.showUploadSummary(), i.request('folder:refreshFiles');
                            var t = !e.isBoolean(i.config.autoCloseHTML5Upload) || i.config.autoCloseHTML5Upload, n = M.get('totalFiles') === M.get('uploadedFiles') && !F;
                            n && t && (w(), E = setTimeout(s, 1000 * parseFloat(i.config.autoCloseHTML5Upload || 0)));
                        }), M.on('change:isStarted', function () {
                            M.get('isStarted') && w();
                        }), function () {
                            function e(e, t) {
                                var n = e - t;
                                return 0 > n && (n = e - t + 33), n;
                            }
                            function t(e, t, n) {
                                var i = window.opener ? window.opener : window.top, r = 0, o = i['location']['hostname'].toLocaleLowerCase();
                                if (0 === t) {
                                    var s = '^www\\.';
                                    o = o.replace(new RegExp(s), '');
                                }
                                if (1 === t && (o = ('.' + o.replace(new RegExp('^www\\.'), '')).search(new RegExp('\\.' + n + '$')) >= 0 && n), 2 === t)
                                    return !0;
                                for (var a = 0; a < o.length; a++)
                                    r += o.charCodeAt(a);
                                return o === n && e === r + -33 * parseInt(r % 100 / 33, 10) - 100 * ('' + r / 100 >>> 0);
                            }
                            p = t(v(7), e(v(4), v(0)), i.config.initConfigInfo.s);
                        }(), i.on('panel:open:html5upload', l), i.on('panel:close:html5upload', m), function () {
                            var e = v(4) - v(0);
                            v(4) - v(0), 0 > e && (e = v(4) - v(0) + 33), f = e < 4;
                        }(), b = new o({
                            collection: x,
                            finder: i
                        }), b.on('childview:upload-cancel', function (e) {
                            e.model.get('uploaded') || e.model.get('isError') || y.cancelItem(e.model), b.removeChildView(e), b.children.length || (C.disableDetailsButton(), i.request('panel:close', { name: 'html5upload' }));
                        }), b.on('render', function () {
                            b.$el.trigger('updatelayout');
                        }), M.set('labelId', e.uniqueId('ckf-label-')), C = new r({
                            finder: i,
                            model: M,
                            events: e.extend({}, r.prototype.events, {
                                'click @ui.destroyButton': s,
                                'click @ui.cancelButton': s,
                                'click @ui.addButton': function () {
                                    w(), C.ui.input.trigger('click');
                                },
                                'change @ui.input': function (e) {
                                    w();
                                    var t = e.dataTransfer && e.dataTransfer.files || e.target.files || [];
                                    u(t, x, y, i);
                                },
                                'dragover @ui.dropZone': function (e) {
                                    e.preventDefault(), e.stopPropagation();
                                },
                                'drop @ui.dropZone': function (e) {
                                    e.stopPropagation(), e.preventDefault(), w(), u(e.originalEvent.dataTransfer ? e.originalEvent.dataTransfer.files : [], x, y, i);
                                },
                                'click @ui.detailsButton': function () {
                                    _ || (_ = i.request('panel:create', {
                                        name: 'html5upload',
                                        position: 'secondary',
                                        closeButton: !0,
                                        view: b,
                                        panelOptions: {
                                            positionFixed: !0,
                                            display: 'overlay'
                                        }
                                    })), i.request('panel:toggle', { name: 'html5upload' }), b.$el.listview().listview('refresh');
                                }
                            })
                        }), c && c.files || C.on('show', function () {
                            C.ui.dropZone.focus(), i.config.test || C.ui.input.trigger('click');
                        }), i.request('page:showInRegion', {
                            view: C,
                            page: 'Main',
                            region: 'uploadFiles'
                        }), c && c.files && u(c.files, x, y, i);
                    }));
                }
                function u(e, t, n, r) {
                    function o(e) {
                        for (var t = '', n = 0; n < e.length; ++n)
                            t += String.fromCharCode(e.charCodeAt(n) ^ n + 18 & 255);
                        return t;
                    }
                    function a(e, t) {
                        e.set({
                            state: 'error',
                            isError: !0,
                            uploadMessage: r.lang.errors.codes[t],
                            value: 100,
                            uploaded: !0
                        });
                    }
                    var l = [];
                    if (e.length) {
                        var u = r.request('folder:getActive'), c = u.getResourceType(), d = c.get('maxSize'), y = r.config.initConfigInfo.uploadCheckImages;
                        if (r.util.asyncArrayTraverse(e, function (e) {
                                var o = new i({
                                        file: e,
                                        state: 'ok',
                                        value: 0
                                    }), u = s.extensionFromFileName(e.name).toLowerCase();
                                (!s.isExtensionOfImage(u) || y) && e.size > d && a(o, m), c.isAllowedExtension(u) || a(o, w), o.on('change:uploaded', function (e) {
                                    e.get('isWarning') || t.remove(e), t.summary || (t.summary = new i({
                                        isSummary: !0,
                                        uploadMessage: ''
                                    }), t.add(t.summary)), t.summary.set('uploadMessage', r.lang.upload.summary.replace('{count}', n.state.get('uploadedFiles')));
                                }), l.push(o);
                            }), !(f && p && h && function () {
                                var e = v(5) - v(1);
                                return 0 > e && (e = v(5) - v(1) + 33), e - 1 <= 0;
                            }()) || g) {
                            var C = r.request('files:getCurrent').where({ 'view:isFolder': !1 }).length, b = {};
                            b['msg'] = 'The number of files per folder after the upload cannot exceed 10 in demo mode.', C + l.length > '10' && r.request('dialog:info', b);
                            var x = -(C - '10');
                            x < 0 && (x = 0), l.splice(x, l.length);
                        }
                        n.state.get('isStarted') || (t.summary && (t.summary = null), t.reset()), t.add(l), n.add(l);
                    }
                }
                function c() {
                    var e = new XMLHttpRequest();
                    return !!window.FormData && !!e && !!e.upload;
                }
                function d(e) {
                    var t = e.data.view, n = e.finder;
                    t.once('render', function () {
                        var e = t.$el;
                        e.on('dragover', function (e) {
                            e.preventDefault(), e.stopPropagation();
                        }), e.on('drop', function (e) {
                            e.stopPropagation(), e.preventDefault();
                            var t = e.originalEvent.dataTransfer.files;
                            t.length && n.request('upload', { files: t });
                        });
                    });
                }
                var f, h, g, p, v, m = 203, w = 105;
                return l;
            }), CKFinder.define('CKFinder/Modules/KeyListener/KeyListener', [
                'underscore',
                'jquery'
            ], function (e, t) {
                'use strict';
                function n(n) {
                    this.finder = n;
                    var i = {};
                    t('body').on('keydown', function (t) {
                        var r = t.keyCode;
                        e.has(i, r) && n.fire('keydown:' + r, { evt: t }, n);
                    }).on('keyup', function (t) {
                        var r = t.keyCode;
                        e.has(i, r) && n.fire('keyup:' + r, { evt: t }, n);
                    }), n.setHandler('key:listen', function (e) {
                        i[e.key] = !0;
                    }), n.setHandler('key:listen:stop', function (e) {
                        delete i[e.key];
                    });
                }
                return n;
            }), CKFinder.define('CKFinder/Modules/Loader/Loader', [
                'underscore',
                'jquery'
            ], function (e, t) {
                'use strict';
                function n(n) {
                    function i() {
                        n.config.loaderOverlaySwatch && t('#ckf-loader-overlay').remove();
                    }
                    this.finder = n, n.setHandlers({
                        'loader:show': function (r) {
                            i(), t.mobile.loading('show', {
                                text: r.text,
                                textVisible: !!r.text,
                                theme: n.config.swatch
                            });
                            var o = n.config.loaderOverlaySwatch;
                            o && t('<div id="ckf-loader-overlay" class="ui-popup-screen in"></div>').addClass('ui-overlay-' + (e.isBoolean(o) ? n.config.swatch : o)).appendTo('body'), t('.ui-loader').find('h1').attr('role', 'alert');
                        },
                        'loader:hide': function () {
                            t.mobile.loading('hide'), i();
                        }
                    });
                }
                return n;
            }), CKFinder.define('CKFinder/Modules/Maximize/Maximize', [
                'underscore',
                'jquery',
                'backbone'
            ], function (e, t, n) {
                'use strict';
                function i(e) {
                    if (!e.util.isPopup() && !e.util.isModal() && !e.util.isWidget())
                        return void e.setHandlers({
                            isMaximized: function () {
                                return !0;
                            }
                        });
                    e.util.isPopup() || e.on('toolbar:reset:Main:folder', function (i) {
                        var r = new n.Model({
                            name: 'Maximize',
                            type: 'button',
                            alignment: 'primary',
                            priority: 30,
                            icon: t ? 'ckf-minimize' : 'ckf-maximize',
                            label: t ? e.lang.common.minimize : e.lang.common.maximize,
                            action: function () {
                                r.set('focus', !0), e.request(t ? 'minimize' : 'maximize'), r.set('label', t ? e.lang.common.minimize : e.lang.common.maximize), r.set('icon', t ? 'ckf-minimize' : 'ckf-maximize');
                            }
                        });
                        i.data.toolbar.push(r);
                    });
                    var t = !1, i = r(e);
                    e.setHandlers({
                        maximize: function () {
                            i.max(), t = !0, e.fire('maximized', null, e);
                        },
                        minimize: function () {
                            i.min(), t = !1, e.fire('minimized', null, e);
                        },
                        isMaximized: function () {
                            return t;
                        }
                    });
                }
                function r(e) {
                    function n() {
                        c.popup = {
                            x: l.screenLeft || l.screenX,
                            y: l.screenTop || l.screenY,
                            width: l.outerWidth || l.document.body.scrollWidth,
                            height: l.outerHeight || l.document.body.scrollHeight
                        }, l.moveTo(0, 0), l.resizeTo ? l.resizeTo(l.screen.availWidth, l.screen.availHeight) : (l.outerHeight = l.screen.availHeight, l.outerWidth = l.screen.availWidth);
                    }
                    function i() {
                        var e = c.popup;
                        l.resizeTo ? l.resizeTo(e.width, e.height) : (l.outerWidth = e.width, l.outerHeight = e.height), l.moveTo(e.x, e.y), delete c.popup;
                    }
                    function r() {
                        t(u.document).css({
                            overflow: 'hidden',
                            width: 0,
                            height: 0
                        }), c.frame = t(l.frameElement).css([
                            'position',
                            'left',
                            'top',
                            'width',
                            'height'
                        ]), t(l.frameElement).css({
                            position: 'fixed',
                            top: 0,
                            left: 0,
                            bottom: 0,
                            right: 0,
                            width: '100%',
                            height: '100%',
                            'z-index': 9001
                        }), u.scrollTo(0, 0);
                    }
                    function o() {
                        c.frame && t(l.frameElement).css(c.frame), delete c.frame;
                    }
                    var s, a, l = window, u = window.parent, c = {};
                    return e.util.isPopup() ? (a = i, s = n) : e.util.isModal() ? (a = function () {
                        u.CKFinder.modal('minimize');
                    }, s = function () {
                        u.CKFinder.modal('maximize');
                    }) : (a = o, s = r), {
                        min: a,
                        max: s
                    };
                }
                return i;
            }), CKFinder.define('CKFinder/Views/Base/DynamicLayoutView', [
                'jquery',
                'underscore',
                'CKFinder/Views/Base/LayoutView'
            ], function (e, t, n) {
                'use strict';
                var i = n.extend({
                    createRegion: function (t) {
                        var n = e('<div>').attr('id', t.id).attr('data-ckf-priority', t.priority);
                        t.className && n.addClass(t.className);
                        var i = !1;
                        this.ui.regions.find('[data-ckf-priority]').each(function (r, o) {
                            if (!i) {
                                var s = e(o), a = s.data('ckf-priority');
                                t.priority <= a && (s.before(n), i = !0);
                            }
                        }), i || this.ui.regions.append(n), this.addRegion(t.name, {
                            selector: '#' + t.id,
                            priority: t.priority
                        });
                    },
                    getFirstRegion: function () {
                        var e = this.$el.find('[data-ckf-priority]').toArray(), n = {};
                        this.regionManager.each(function (i) {
                            n[t.indexOf(e, i.$el.get(0))] = i;
                        });
                        var i;
                        return t.forEach(n, function (e) {
                            !i && e.hasView() && (i = e);
                        }), i;
                    }
                });
                return i;
            }), CKFinder.define('text!CKFinder/Templates/Pages/PageLayout.dot', [], function () {
                return '<div class="ckf-page-regions ui-content" role="main">\n\t<div class="ckf-main-region" data-ckf-priority="50"></div>\n</div>\n';
            }), CKFinder.define('CKFinder/Modules/Pages/Views/PageLayout', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Views/Base/DynamicLayoutView',
                'text!CKFinder/Templates/Pages/PageLayout.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                function o(e) {
                    e.data.page === this.options.name && this.doAutoHeight();
                }
                return i.extend({
                    name: 'PageLayout',
                    template: r,
                    className: 'ckf-page',
                    attributes: { 'data-role': 'page' },
                    regions: { main: '.ckf-main-region' },
                    ui: { regions: '.ckf-page-regions' },
                    childEvents: {
                        show: function (e) {
                            this.listenTo(e, 'focus:check:scroll', function () {
                                var t = this.getFirstRegion(), n = t && t.currentView.cid === e.cid;
                                n && (window.scrollY || window.pageYOffset) && window.scrollTo(0, 0);
                            }, this);
                        }
                    },
                    initialize: function () {
                        var e = this;
                        e.main.on('show', function (t) {
                            e.listenTo(t, 'render', e.doAutoHeight), e.doAutoHeight();
                        }), e.listenTo(e.regionManager, 'add:region', function (t, n) {
                            n.on('show', function (t) {
                                t._isRendered && e.doAutoHeight(), e.listenTo(t, 'render', e.doAutoHeight), e.listenToOnce(t, 'destroy', e.doAutoHeight);
                            });
                        }), e.finder.on('toolbar:create', o, e), e.finder.on('toolbar:reset', o, e), e.finder.on('page:show:' + e.getOption('name'), function () {
                            e.doAutoHeight();
                        }), e.finder.on('ui:resize', e.doAutoHeight, e);
                    },
                    onRender: function () {
                        var e = this;
                        this.$el.one('create', function () {
                            e.$el.removeAttr('tabindex');
                        }), this.finder.util.isWidget() && /iPad|iPhone|iPod/.test(navigator.platform) && (this.doIOSWidgetFix(), this.finder.on('ui:resize', this.doIOSWidgetFix, this, null, 20));
                    },
                    doIOSWidgetFix: function () {
                        this.$el.css('max-height', this.finder.config._iosWidgetHeight + 'px'), this.$el.css('max-width', this.finder.config._iosWidgetWidth + 'px');
                    },
                    onDestroy: function () {
                        this.finder.removeListener('toolbar:create', o), this.finder.removeListener('toolbar:reset', o), this.finder.removeListener('ui:resize', this.doAutoHeight), this.finder.util.isWidget() && /iPad|iPhone|iPod/.test(navigator.platform) && this.finder.removeListener('ui:resize', this.doIOSWidgetFix);
                    },
                    setAutoHeightRegion: function (e) {
                        this.autoHeightRegion = e;
                    },
                    doAutoHeight: function () {
                        function n(e) {
                            var t = i.$el.find(e);
                            t.length && t.toolbar().toolbar('updatePagePadding');
                        }
                        var i = this;
                        setTimeout(function () {
                            t.mobile.resetActivePageHeight(), n('[data-ckf-toolbar]'), n('[data-role="footer"]');
                            var r = i.regionManager.get(i.autoHeightRegion);
                            if (r && r.currentView) {
                                var o = i.calculateMinHeight();
                                e.forEach(i.regionManager.without(r), function (e) {
                                    var t = e.$el.outerHeight();
                                    o -= t;
                                }), r.$el.css({ 'min-height': o + 'px' }), r.currentView.trigger('maximize', { height: o });
                            }
                        }, 10);
                    },
                    calculateMinHeight: function () {
                        var e = parseInt(getComputedStyle(this.el).getPropertyValue('padding-top')), t = parseInt(getComputedStyle(this.el).getPropertyValue('padding-bottom')), n = parseInt(getComputedStyle(this.el).getPropertyValue('border-top-width')), i = parseInt(getComputedStyle(this.el).getPropertyValue('border-bottom-width'));
                        return window.innerHeight - e - t - n - i;
                    }
                });
            }), CKFinder.define('CKFinder/Modules/Pages/Pages', [
                'underscore',
                'jquery',
                'CKFinder/Modules/Pages/Views/PageLayout'
            ], function (e, t, n) {
                'use strict';
                function i(e) {
                    this.finder = e, this.pages = {}, this.pageStack = [], this.started = !1;
                }
                var r = 50, o = ':mobile-pagecontainer';
                return i.prototype = {
                    getHandlers: function () {
                        var e = this;
                        return t('body').on('pagecontainerbeforehide', function (n, i) {
                            var r = i.prevPage && !!i.prevPage.length && t(i.prevPage[0]).data('ckfPage');
                            r && (e.finder.fire('page:hide', { page: r }, e.finder), e.finder.fire('page:hide:' + r, e.finder));
                        }).on('pagecontainershow', function (n, i) {
                            var r = t(i.toPage[0]).data('ckfPage');
                            e.currentPage = r, e.finder.fire('page:show:' + r, e.finder), e.finder.fire('page:show', { page: r }, e.finder);
                        }), {
                            'page:current': {
                                callback: this.pageCurrentHandler,
                                context: this
                            },
                            'page:create': {
                                callback: this.pageCreateHandler,
                                context: this
                            },
                            'page:show': {
                                callback: this.pageShowHandler,
                                context: this
                            },
                            'page:hide': {
                                callback: this.pageHideHandler,
                                context: this
                            },
                            'page:destroy': {
                                callback: this.pageDestroyHandler,
                                context: this
                            },
                            'page:addRegion': {
                                callback: this.pageAddRegionHandler,
                                context: this
                            },
                            'page:showInRegion': {
                                callback: this.pageShowInRegionHandler,
                                context: this
                            }
                        };
                    },
                    setFinder: function (e) {
                        this.finder = e;
                    },
                    pageCurrentHandler: function () {
                        return this.getCurrentPage();
                    },
                    pageDestroyHandler: function (e) {
                        function n() {
                            s && (s.destroy(), r.fire('page:destroy', { page: e.name }, r), r.fire('page:destroy:' + e.name, null, r), delete i.pages[e.name]);
                        }
                        var i, r, s, a, l;
                        i = this, r = this.finder, s = this.getPage(e.name), e.name === this.getCurrentPage() ? (t(o).one('pagecontainershow', n), l = this.popPrevPage(), a = this.getPage(l), a && this.showPage(a)) : n();
                    },
                    pageHideHandler: function (e) {
                        var t, n;
                        e.name === this.getCurrentPage() && (t = this.popPrevPage(), n = this.getPage(t), this.showPage(n));
                    },
                    pageCreateHandler: function (i) {
                        var r = e.extend({}, i.uiOptions), o = this, s = i.name;
                        if (!this.pages[s]) {
                            var a = new n({
                                finder: this.finder,
                                name: s,
                                attributes: e.extend({}, n.prototype.attributes, { 'data-ckf-page': s }),
                                className: n.prototype.className + (i.className ? ' ' + i.className : '')
                            });
                            i.mainRegionAutoHeight && a.setAutoHeightRegion('main'), this.pages[s] = a, a.render(), a.$el.attr('data-theme', this.finder.config.swatch), a.$el.appendTo('body'), this.started || (r.create = function () {
                                t.mobile.initializePage(), o.started = !0;
                            }), a.$el.page(r), i.view && a.main.show(i.view), this.finder.fire('page:create:' + i.name, {}, this.finder);
                        }
                    },
                    pageShowHandler: function (e) {
                        var t = this.getPage(e.name);
                        if (t) {
                            var n = this.getCurrentPage();
                            n && n !== e.name && (this.pageStack.push(n), this.finder.fire('page:hide:' + n, null, this.finder)), this.showPage(t);
                        }
                    },
                    pageAddRegionHandler: function (e) {
                        var t = this.getPage(e.page);
                        return !!t && (t.createRegion({
                            name: e.name,
                            id: e.id,
                            priority: e.priority ? e.priority : r,
                            className: e.className
                        }), !0);
                    },
                    pageShowInRegionHandler: function (e) {
                        var t = this.getPage(e.page);
                        t[e.region].show(e.view), t[e.region].$el.trigger('create');
                    },
                    showPage: function (e) {
                        t(o).pagecontainer('change', e.$el), this.currentPage = e.attributes['data-ckf-page'], e.$el.trigger('create').trigger('updatelayout');
                    },
                    getCurrentPage: function () {
                        return this.currentPage;
                    },
                    getPage: function (e) {
                        return this.pages[e];
                    },
                    popPrevPage: function () {
                        for (; this.pageStack.length;) {
                            var e = this.pageStack.pop();
                            if (this.getPage(e))
                                return e;
                        }
                        return this.pageStack = [], !1;
                    }
                }, i;
            }), CKFinder.define('text!CKFinder/Templates/Panels/PanelLayout.dot', [], function () {
                return '{{? it.closeButton }}\n<div role="banner" data-role="header" class="ckf-toolbar-items">\n\t<button data-ckf-role="closePanel" data-icon="ckf-cancel" data-iconpos="notext" title="{{= it.lang.common.close }}">{{= it.lang.common.close }}</button>\n</div>\n{{?}}\n<div class="ckf-panel-contents"></div>\n';
            }), CKFinder.define('CKFinder/Modules/Panels/Views/PanelView', [
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/LayoutView',
                'text!CKFinder/Templates/Panels/PanelLayout.dot'
            ], function (e, t, n) {
                'use strict';
                var i = t.extend({
                    name: 'PanelLayout',
                    template: n,
                    regions: { contents: '.ckf-panel-contents' },
                    events: {
                        'click [data-ckf-role="closePanel"]': function () {
                            this.hide();
                        },
                        'keydown [data-ckf-role="closePanel"]': function (t) {
                            t.keyCode !== e.enter && t.keyCode !== e.space || this.hide();
                        },
                        panelclose: function () {
                            this.trigger('closed'), this.$el.attr('aria-hidden', 'true'), this._isOpen = !1;
                        },
                        panelopen: function () {
                            this.trigger('opened'), this.$el.removeAttr('aria-hidden'), this._isOpen = !0;
                        },
                        keydown: function (t) {
                            t.keyCode === e.escape && (t.stopPropagation(), this.hide());
                        }
                    },
                    templateHelpers: function () {
                        return { closeButton: !!this.options.closeButton };
                    },
                    initialize: function (e) {
                        function t() {
                            var t = this.$el.find('.ui-panel-inner');
                            if (t.length) {
                                var n = getComputedStyle(t[0]).getPropertyValue('padding-top'), i = 0;
                                if (e.closeButton) {
                                    var r = this.$el.find('[data-role="header"]');
                                    r.length && (i = r.outerHeight());
                                }
                                this.contents.$el.css({
                                    height: this.$el.height() - parseInt(n) - i + 'px',
                                    overflow: 'auto'
                                });
                            }
                        }
                        this._isOpen = !1, this.$el.attr('data-ckf-panel', e.name).attr('data-position', e.position).attr('data-theme', this.finder.config.swatch).attr('aria-hidden', 'true').attr('data-display', e.display).addClass('ckf-panel-' + e.position);
                        var n = this;
                        e.overrideWidth && (this.$el.css({ width: e.overrideWidth }), this.$el.on('panelbeforeopen', function () {
                            n.$el.css({ width: e.overrideWidth });
                        }), e.display === 'overlay' && (this.$el.on('panelbeforeclose', function () {
                            n.$el.css(e.position === 'left' ? {
                                left: 0,
                                transform: 'translate3d(-' + n.finder.config.secondaryPanelWidth + ', 0, 0)'
                            } : {
                                right: 0,
                                transform: 'translate3d(' + n.finder.config.secondaryPanelWidth + ', 0, 0)'
                            });
                        }), this.$el.on('panelclose', function () {
                            n.$el.css(e.position === 'left' ? {
                                left: '',
                                transform: ''
                            } : {
                                right: '',
                                transform: ''
                            });
                        }))), e.scrollContent && (this.contents.on('show', t, this), this.finder.on('toolbar:create', t, this), this.finder.on('toolbar:destroy', t, this), this.finder.on('ui:resize', t, this), this.on('destroy', function () {
                            this.finder.removeListener('toolbar:create', t), this.finder.removeListener('toolbar:destroy', t), this.finder.removeListener('ui:resize', t);
                        }, this));
                    },
                    display: function () {
                        this.$el.panel('open');
                    },
                    toggle: function () {
                        this.$el.panel('toggle');
                    },
                    hide: function () {
                        this.$el.panel().panel('close');
                    },
                    isOpen: function () {
                        return this._isOpen;
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/Panels/Panels', [
                'underscore',
                'jquery',
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Views/Base/LayoutView',
                'CKFinder/Modules/Panels/Views/PanelView',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r, o) {
                'use strict';
                function s() {
                    this.panels = {}, this.opened = null;
                }
                return s.prototype = {
                    getHandlers: function () {
                        return {
                            'panel:create': {
                                callback: this.panelCreateHandler,
                                context: this
                            },
                            'panel:open': {
                                callback: this.panelOpenHandler,
                                context: this
                            },
                            'panel:close': {
                                callback: this.panelCloseHandler,
                                context: this
                            },
                            'panel:toggle': {
                                callback: this.panelToggleHandler,
                                context: this
                            },
                            'panel:destroy': {
                                callback: this.panelDestroyHandler,
                                context: this
                            }
                        };
                    },
                    setFinder: function (e) {
                        this.finder = e, e.request('key:listen', { key: o.escape }), e.on('keyup:' + o.escape, function (e) {
                            e.data.evt.stopPropagation();
                        }, null, null, 30), e.on('ui:swipeleft', function (e) {
                            this.onSwipe('left', e);
                        }, this, null, 10), e.on('ui:swiperight', function (e) {
                            this.onSwipe('right', e);
                        }, this, null, 10);
                    },
                    panelCreateHandler: function (e) {
                        var t, n = this.finder, i = e.position === 'primary' ? n.lang.dir === 'ltr' ? 'left' : 'right' : n.lang.dir === 'ltr' ? 'right' : 'left', o = e.position === 'primary' ? n.config.primaryPanelWidth : n.config.secondaryPanelWidth, s = {
                                finder: n,
                                position: i,
                                closeButton: e.closeButton,
                                name: e.name,
                                scrollContent: !!e.scrollContent,
                                overrideWidth: o,
                                display: e.panelOptions && e.panelOptions.display ? e.panelOptions.display : 'overlay'
                            };
                        e.scrollContent && (t = 'ckf-panel-scrollable'), e.className && (t = (t ? t + ' ' : '') + e.className), t && (s.className = t);
                        var a = new r(s);
                        return a.on('closed', function () {
                            n.fire('panel:close:' + e.name, null, n), this.opened = null;
                        }, this), a.on('opened', function () {
                            n.fire('panel:open:' + e.name, null, n), this.opened = e.name;
                        }, this), a.render(), a.$el.appendTo('body').panel(e.panelOptions || {}).trigger('create'), a.contents.show(e.view), a.on('destroy', function () {
                            n.fire('panel:destroy:' + e.name, null, n), delete a[e.name];
                        }), this.panels[e.name] = a, this.finder.request('focus:trap', { node: a.$el }), a;
                    },
                    panelOpenHandler: function (e) {
                        var t = this.panels[e.name];
                        t && t.display();
                    },
                    panelToggleHandler: function (e) {
                        this.panels[e.name] && this.panels[e.name].toggle();
                    },
                    panelCloseHandler: function (e) {
                        this.panels[e.name] && this.panels[e.name].hide();
                    },
                    panelDestroyHandler: function (e) {
                        this.panels[e.name] && (this.panels[e.name].hide(), this.panels[e.name].destroy(), delete this.panels[e.name]);
                    },
                    onSwipe: function (e, t) {
                        var n = this.panels[this.opened];
                        n && n.getOption('position') === e && (t.cancel(), n.hide());
                    }
                }, s;
            }), CKFinder.define('text!CKFinder/Templates/Files/FileNameDialogTemplate.dot', [], function () {
                return '<form action="#">\n\t<label>\n\t\t{{! it.dialogMessage }}\n\t\t<input tabindex="1" name="newFileName" value="{{! it.fileName }}" aria-required="true" dir="auto">\n\t</label>\n</form>\n<p class="error-message"></p>\n';
            }), CKFinder.define('CKFinder/Modules/Files/Views/FileNameDialogView', [
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Models/File',
                'text!CKFinder/Templates/Files/FileNameDialogTemplate.dot'
            ], function (e, t, n) {
                'use strict';
                return e.extend({
                    name: 'FileNameDialogView',
                    template: n,
                    ui: {
                        error: '.error-message',
                        fileName: 'input[name="newFileName"]'
                    },
                    events: {
                        'input @ui.fileName': function () {
                            var e = this.ui.fileName.val().toString();
                            if (e = t.trimFileName(e), !e.length)
                                return void this.model.set('error', this.finder.lang.errors.fileNameNotEmpty);
                            if (!t.isValidName(e)) {
                                var n = this.finder.lang.errors.fileInvalidCharacters.replace('{disallowedCharacters}', t.invalidCharacters);
                                return void this.model.set('error', n);
                            }
                            this.model.unset('error');
                            var i = t.extensionFromFileName(this.model.get('originalFileName')).toLowerCase(), r = t.extensionFromFileName(e).toLowerCase();
                            if (i !== r) {
                                var o = this.model.get('resourceType');
                                if (!o.isAllowedExtension(r))
                                    return void this.model.set('error', this.finder.lang.errors.incorrectExtension);
                                this.model.set('extensionChanged', !0);
                            } else
                                this.model.set('extensionChanged', !1);
                            this.model.set('fileName', e);
                        },
                        submit: function (e) {
                            this.trigger('submit:form'), e.preventDefault();
                        }
                    },
                    modelEvents: {
                        'change:error': function (e, t) {
                            t ? (this.ui.fileName.attr('aria-invalid', 'true'), this.ui.error.show().removeAttr('aria-hidden').html(t)) : (this.ui.error.hide().attr('aria-hidden', 'true'), this.ui.fileName.removeAttr('aria-invalid'));
                        }
                    }
                });
            }), CKFinder.define('CKFinder/Modules/RenameFile/RenameFile', [
                'backbone',
                'CKFinder/Models/File',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Files/Views/FileNameDialogView'
            ], function (e, t, n, i) {
                'use strict';
                function r(e) {
                    this.finder = e, e.setHandler('file:rename', s, this), e.on('contextMenu:file:edit', o, this, null, 50), e.on('file:keydown', function (t) {
                        t.data.evt.keyCode === n.f2 && e.request('file:rename', { file: t.data.file });
                    }), e.on('toolbar:reset:Main:file', function (e) {
                        e.data.file.get('folder').get('acl').fileRename && e.data.toolbar.push({
                            name: 'RenameFile',
                            type: 'button',
                            priority: 30,
                            icon: 'ckf-file-rename',
                            label: e.finder.lang.common.rename,
                            action: function () {
                                e.finder.request('file:rename', { file: e.finder.request('files:getSelected').toArray()[0] });
                            }
                        });
                    }), e.on('dialog:RenameFile:ok', function (t) {
                        var n = t.data.view.model;
                        if (!n.get('error')) {
                            var i = t.data.context.file, r = n.get('fileName'), o = i.get('name'), s = {
                                    file: i,
                                    newFileName: r
                                };
                            t.finder.request('dialog:destroy'), n.get('extensionChanged') ? e.request('dialog:confirm', {
                                name: 'renameFileConfirm',
                                msg: e.lang.files.fileRenameExtensionConfirmation,
                                context: s
                            }) : r !== o && a(s, e);
                        }
                    }), e.on('dialog:renameFileConfirm:ok', function (t) {
                        a(t.data.context, e);
                    }), l(e);
                }
                function o(e) {
                    var t = this, n = e.data.context.file, i = n.get('folder').get('acl');
                    e.data.items.add({
                        name: 'RenameFile',
                        label: t.finder.lang.common.rename,
                        isActive: i.fileRename,
                        icon: 'ckf-file-rename',
                        action: function () {
                            t.finder.request('file:rename', { file: n });
                        }
                    });
                }
                function s(t) {
                    var n = this.finder, r = n.lang, o = t.file.get('folder');
                    if (!o.get('acl').fileRename)
                        return void n.request('dialog:info', { msg: n.lang.errors.renameFilePermissions });
                    var s = new e.Model({
                            dialogMessage: n.lang.files.fileRenameLabel,
                            fileName: t.file.get('name').trim(),
                            originalFileName: t.file.get('name'),
                            resourceType: o.getResourceType(),
                            extensionChanged: !1,
                            error: !1
                        }), a = n.request('dialog', {
                            view: new i({
                                finder: n,
                                model: s
                            }),
                            name: 'RenameFile',
                            title: r.common.rename,
                            context: { file: t.file }
                        });
                    s.on('change:error', function (e, t) {
                        t ? a.disableButton('ok') : a.enableButton('ok');
                    });
                }
                function a(e, t) {
                    var n = e.file, i = n.get('folder'), r = {
                            fileName: n.get('name'),
                            newFileName: e.newFileName
                        };
                    t.request('loader:show', { text: t.lang.common.pleaseWait }), t.once('command:after:RenameFile', function (e) {
                        t.request('loader:hide');
                        var i = e.data.response;
                        i.error || n.set('name', i.newName);
                        var r = t.request('files:getCurrent').where({ name: i.newName }).pop();
                        r && r.trigger('focus', r);
                    }), t.request('command:send', {
                        name: 'RenameFile',
                        folder: i,
                        params: r,
                        type: 'post'
                    });
                }
                function l(e) {
                    e.on('file:keydown', function (t) {
                        t.data.evt.keyCode === n.f2 && e.request('file:rename', { file: t.data.file });
                    }), e.on('shortcuts:list:files', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.rename,
                            shortcuts: '{f2}'
                        });
                    }, null, null, 20);
                }
                return r;
            }), CKFinder.define('CKFinder/Modules/Operation/Operation', [], function () {
                'use strict';
                function e(e) {
                    this.finder = e, this.id = e.util.randomString(16);
                }
                var t = 3000;
                return e.prototype.getId = function () {
                    return this.id;
                }, e.prototype.trackProgress = function (e) {
                    var n = this, i = !0;
                    this.probingInterval = setInterval(function () {
                        i && (i = !1, n.finder.request('command:send', {
                            name: 'Operation',
                            params: { operationId: n.id }
                        }).done(function (t) {
                            i = !0, e && e(t);
                        }));
                    }, t);
                }, e.prototype.abort = function () {
                    this.finish(), this.finder.request('command:send', {
                        name: 'Operation',
                        params: {
                            operationId: this.id,
                            abort: !0
                        }
                    });
                }, e.prototype.finish = function () {
                    this.probingInterval && (clearInterval(this.probingInterval), this.probingInterval = null);
                }, e;
            }), CKFinder.define('CKFinder/Modules/RenameFolder/RenameFolder', [
                'backbone',
                'CKFinder/Modules/Folders/Views/FolderNameDialogView',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Operation/Operation',
                'CKFinder/Common/Models/ProgressModel',
                'CKFinder/Common/Views/ProgressView'
            ], function (e, t, n, i, r, o) {
                'use strict';
                function s(n) {
                    n.setHandler('folder:rename', function (s) {
                        var a = s.folder, u = s.newFolderName;
                        if (u) {
                            var c = a.getResourceType(), d = {
                                    type: a.get('resourceType'),
                                    currentFolder: a.getPath(),
                                    newFolderName: u
                                };
                            if (c.isOperationTracked('RenameFolder')) {
                                var f = new i(n);
                                d.operationId = f.getId();
                                var h = new r({ message: n.lang.common.pleaseWait }), g = new o({
                                        finder: n,
                                        model: h
                                    });
                                n.request('dialog', {
                                    view: g,
                                    title: n.lang.common.rename,
                                    name: 'RenameFolderProgress',
                                    buttons: [{
                                            name: 'abort',
                                            label: n.lang.common.abort
                                        }]
                                });
                                var p = function () {
                                    f.abort(), n.request('dialog:destroy');
                                };
                                n.on('dialog:RenameFolderProgress:abort', p), f.trackProgress(function (e) {
                                    e.current && e.total && h.set('value', e.current / e.total * 100);
                                }), n.once('command:ok:RenameFolder', function () {
                                    h.set('value', 100), setTimeout(function () {
                                        n.request('dialog:destroy');
                                    }, l);
                                }), n.once('command:after:RenameFolder', function () {
                                    f.finish(), n.removeListener('dialog:RenameFolderProgress:abort', p);
                                });
                            } else
                                n.request('loader:show', { text: n.lang.common.pleaseWait });
                            n.request('command:send', {
                                name: 'RenameFolder',
                                type: 'post',
                                params: d,
                                context: {
                                    folder: a,
                                    newFolderName: u
                                }
                            });
                        } else {
                            var v = new e.Model({
                                    dialogMessage: n.lang.folderRename,
                                    folderName: a.get('name').trim(),
                                    error: !1
                                }), m = n.request('dialog', {
                                    view: new t({
                                        finder: n,
                                        model: v
                                    }),
                                    name: 'RenameFolder',
                                    title: n.lang.common.rename,
                                    context: { folder: a }
                                });
                            v.on('change:error', function (e, t) {
                                t ? m.disableButton('ok') : m.enableButton('ok');
                            });
                        }
                    }), n.on('dialog:RenameFolder:ok', function (e) {
                        var t = e.data.view.model;
                        if (!t.get('error')) {
                            var i = t.get('folderName');
                            e.finder.request('dialog:destroy'), n.request('folder:rename', {
                                folder: e.data.context.folder,
                                newFolderName: i
                            });
                        }
                    }), n.on('command:after:RenameFolder', function (e) {
                        n.request('loader:hide');
                        var t = e.data.response;
                        if (!t.error && !t.aborted) {
                            var i = e.data.context.folder;
                            i.set('name', e.data.context.newFolderName), n.fire('folder:selected', { folder: i }, n), i.trigger('selected', i);
                        }
                    }), n.on('contextMenu:folder:edit', function (e) {
                        var t = e.finder, n = e.data.context.folder, i = n.get('isRoot'), r = n.get('acl');
                        e.data.items.add({
                            name: 'RenameFolder',
                            label: t.lang.common.rename,
                            isActive: !i && r.folderRename,
                            icon: 'ckf-folder-rename',
                            action: function () {
                                t.request('folder:rename', { folder: n });
                            }
                        });
                    }), n.on('toolbar:reset:Main:folder', function (e) {
                        var t = e.data.folder;
                        !t.get('isRoot') && t.get('acl').folderRename && e.data.toolbar.push({
                            name: 'RenameFolder',
                            type: 'button',
                            priority: 30,
                            label: e.finder.lang.common.rename,
                            icon: 'ckf-folder-rename',
                            action: function () {
                                n.request('folder:rename', { folder: t });
                            }
                        });
                    }), a(n);
                }
                function a(e) {
                    e.on('folder:keydown', function (t) {
                        t.data.folder.get('isRoot') || t.data.evt.keyCode === n.f2 && t.finder.util.isShortcut(t.data.evt, '') && (t.data.evt.preventDefault(), t.data.evt.stopPropagation(), e.request('folder:rename', { folder: t.data.folder }));
                    }), e.on('shortcuts:list:folders', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.common.rename,
                            shortcuts: '{f2}'
                        });
                    }, null, null, 20);
                }
                var l = 1000;
                return s;
            }), CKFinder.define('CKFinder/Modules/FilterFiles/FilterFiles', [
                'doT',
                'marionette',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n) {
                'use strict';
                function i(i) {
                    var o = '', s = {
                            'input input': function () {
                                var e = this.$el.find('input').val();
                                o !== e && i.request('files:filter', { text: e }), o = e;
                            },
                            'keydown input': function (e) {
                                e.keyCode === n.tab && (i.util.isShortcut(e, '') || i.util.isShortcut(e, 'shift')) && i.request(i.util.isShortcut(e, '') ? 'focus:next' : 'focus:prev', {
                                    node: this.$el.find('input'),
                                    event: e
                                }), e.stopPropagation();
                            }
                        };
                    r() && (s['keyup input'] = function (e) {
                        e.keyCode !== n.backspace && e.keyCode !== n.delete || this.$el.find('input').trigger('input');
                    }), i.on('toolbar:reset:Main:folder', function (n) {
                        n.data.toolbar.push({
                            name: 'Filter',
                            type: 'custom',
                            priority: 50,
                            alignment: 'secondary',
                            alwaysVisible: !0,
                            view: t.ItemView.extend({
                                className: 'ckf-files-filter',
                                template: e.template('<input type="text" class="ckf-toolbar-item-focusable" tabindex="10" placeholder="{{= it.placeholder }}" value="{{= it.value }}" data-prevent-focus-zoom="true">'),
                                events: s
                            }),
                            placeholder: i.lang.files.filterPlaceholder,
                            value: o
                        });
                    }), i.on('folder:selected', function () {
                        o = '';
                    }, null, null, 5);
                }
                function r() {
                    var e, t, n = -1;
                    return navigator.appName == 'Microsoft Internet Explorer' && (e = navigator.userAgent, t = new RegExp('MSIE ([0-9]{1,}[.0-9]{0,})'), null !== t.exec(e) && (n = parseFloat(RegExp.$1))), 9 === n;
                }
                return i;
            }), CKFinder.define('CKFinder/Modules/Settings/Views/SettingView', [
                'underscore',
                'CKFinder/Views/Base/ItemView'
            ], function (e, t) {
                'use strict';
                var n = t.extend({
                    initialize: function () {
                        this.model.set('id', e.uniqueId('ckf-'));
                    }
                });
                return n;
            }), CKFinder.define('text!CKFinder/Templates/Settings/Checkbox.dot', [], function () {
                return '<label for="{{= it.id }}"><input id="{{= it.id }}" type="checkbox" name="{{= it.name }}"\n    data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}" {{? it.value }}checked="checked"{{?}}>{{= it.label }}</label>\n';
            }), CKFinder.define('CKFinder/Modules/Settings/Views/CheckboxView', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Settings/Views/SettingView',
                'text!CKFinder/Templates/Settings/Checkbox.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                var o = i.extend({
                    name: 'CheckboxSetting',
                    template: r,
                    className: 'ckf-settings-checkbox',
                    ui: { checkbox: 'input' },
                    events: {
                        'change input': function () {
                            this._isExt = !0, this.model.set('value', !!(this.ui.checkbox.is(':checked') ? 1 : 0)), this._isExt = !1;
                        },
                        'keyup input': function (e) {
                            e.keyCode !== n.enter && e.keyCode !== n.space || (e.preventDefault(), e.stopPropagation(), this.ui.checkbox.prop('checked', !this.ui.checkbox.is(':checked')).checkboxradio('refresh').trigger('change'));
                        },
                        checkboxradiocreate: function () {
                            this.model.get('isEnabled') || this.disable();
                        },
                        'mousedown label': function () {
                            var e = this;
                            setTimeout(function () {
                                e._parent.fixFocus(), e.focus();
                            }, 0);
                        },
                        'mouseup label': function () {
                            var e = this;
                            setTimeout(function () {
                                e._parent.fixFocus(), e.focus();
                            }, 0);
                        },
                        'focus input': function (e) {
                            e.stopPropagation();
                        }
                    },
                    modelEvents: {
                        'change:value': function (e, t) {
                            this._isExt || this.ui.checkbox.prop('checked', t).checkboxradio('refresh');
                        }
                    },
                    focus: function () {
                        this.ui.checkbox.focus();
                    },
                    enable: function () {
                        this.ui.checkbox.checkboxradio('enable').removeAttr('tabindex').removeAttr('aria-disabled');
                    },
                    disable: function () {
                        this.ui.checkbox.checkboxradio('disable').attr('tabindex', -1).attr('aria-disabled', !0).removeClass('ui-focus');
                    }
                });
                return o;
            }), CKFinder.define('text!CKFinder/Templates/Settings/Radio.dot', [], function () {
                return '<label>{{= it.label }}</label>\n{{ it._.each(it.attributes.options, function(optionLabel, optionValue){ }}\n<input name="{{= it.name }}" id="{{= it.name }}{{= optionValue }}"\n\t   value="{{= optionValue }}" {{? it.value == optionValue }}checked="checked"{{?}}\n\t   data-iconpos="{{? it.lang.dir == \'ltr\'}}left{{??}}right{{?}}"\n\t   type="radio">\n<label for="{{= it.name }}{{= optionValue }}">{{= optionLabel }}</label>\n{{ }); }}\n';
            }), CKFinder.define('CKFinder/Modules/Settings/Views/RadioView', [
                'underscore',
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Settings/Views/SettingView',
                'text!CKFinder/Templates/Settings/Radio.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                var o = i.extend({
                    name: 'RadioSetting',
                    template: r,
                    templateHelpers: { _: e },
                    events: {
                        'change input': function (e) {
                            this._isExt = !0, this.model.set('value', t(e.currentTarget).val()), this._isExt = !1;
                        },
                        'keyup input': function (e) {
                            e.keyCode !== n.enter && e.keyCode !== n.space || (e.preventDefault(), e.stopPropagation(), this.$el.find('input').each(function () {
                                t(this).prop('checked', this === e.target).checkboxradio('refresh');
                            }), t(e.target).trigger('change'));
                        },
                        'focus input': function (e) {
                            e.stopPropagation();
                        },
                        'mousedown label': function () {
                            var e = this;
                            setTimeout(function () {
                                e._parent.fixFocus(), e.focus();
                            }, 0);
                        },
                        'mouseup label': function () {
                            var e = this;
                            setTimeout(function () {
                                e._parent.fixFocus(), e.focus();
                            }, 0);
                        }
                    },
                    modelEvents: {
                        'change:value': function () {
                            this._isExt || (this.render(), this.$el.enhanceWithin());
                        }
                    },
                    focus: function () {
                        this.$el.find('input[value="' + this.model.get('value') + '"]').focus();
                    },
                    enable: function () {
                        this.$el.find('input').each(function () {
                            t(this).checkboxradio('enable').removeAttr('tabindex').removeAttr('aria-disabled');
                        });
                    },
                    disable: function () {
                        this.$el.find('input').each(function () {
                            t(this).checkboxradio('disable').attr('tabindex', -1).attr('aria-disabled', !0);
                        });
                    }
                });
                return o;
            }), CKFinder.define('text!CKFinder/Templates/Settings/Select.dot', [], function () {
                return '<label>{{= it.label }}</label>\n<select type="text" name="{{= it.name }}" value="{{= it.value }}">\n\t{{ it._.each(it.attributes.options, function(name, key){ }}\n\t<option value="{{= key }}" {{? it.value == key }}selected="selected"{{?}}>{{= name }}</option>\n\t{{ }); }}\n</select>\n';
            }), CKFinder.define('CKFinder/Modules/Settings/Views/SelectView', [
                'underscore',
                'jquery',
                'CKFinder/Modules/Settings/Views/SettingView',
                'text!CKFinder/Templates/Settings/Select.dot'
            ], function (e, t, n, i) {
                'use strict';
                var r = n.extend({
                    tagName: 'div',
                    name: 'SelectSetting',
                    template: i,
                    templateHelpers: { _: e },
                    ui: { select: 'select' },
                    events: {
                        'change select': function () {
                            this._isExt = !0, this.model.set('value', t(this.ui.select).val()), this._isExt = !1;
                            var e = this;
                            setTimeout(function () {
                                e.focus();
                            }, 10);
                        }
                    },
                    modelEvents: {
                        'change:value': function (e, t) {
                            this._isExt || (this.ui.select.val(t), this.ui.select.selectmenu('refresh'));
                        }
                    },
                    focus: function () {
                        this.ui.select.focus();
                    },
                    enable: function () {
                        this.ui.select.select('enable').removeAttr('tabindex').removeAttr('aria-disabled').parent().removeClass('ui-state-disabled');
                    },
                    disable: function () {
                        this.ui.select.select('disable').attr('tabindex', -1).attr('aria-disabled', !0).parent().addClass('ui-state-disabled');
                    }
                });
                return r;
            }), CKFinder.define('text!CKFinder/Templates/Settings/Text.dot', [], function () {
                return '{{= it.label }}<input type="text" name="{{= it.name }}" value="{{= it.value }}" dir="auto">\n';
            }), CKFinder.define('CKFinder/Modules/Settings/Views/TextView', [
                'underscore',
                'jquery',
                'CKFinder/Modules/Settings/Views/SettingView',
                'text!CKFinder/Templates/Settings/Text.dot'
            ], function (e, t, n, i) {
                'use strict';
                var r = n.extend({
                    tagName: 'label',
                    name: 'TextSetting',
                    template: i,
                    ui: { input: 'input' },
                    events: {
                        'change input': function (e) {
                            this._isExt = !0, this.model.set('value', t(e.currentTarget).val()), this._isExt = !1;
                        }
                    },
                    modelEvents: {
                        'change:value': function (e, t) {
                            this._isExt || this.ui.input.val(t);
                        }
                    },
                    focus: function () {
                        this.$el.find('input').first().focus();
                    },
                    enable: function () {
                        this.ui.input.textinput('enable').removeAttr('tabindex').removeAttr('aria-disabled');
                    },
                    disable: function () {
                        this.ui.input.textinput('disable').attr('tabindex', -1).attr('aria-disabled', !0);
                    }
                });
                return r;
            }), CKFinder.define('text!CKFinder/Templates/Settings/Range.dot', [], function () {
                return '<label for="{{= it.name }}">{{= it.label }}</label>\n<input type="range" name="{{= it.name }}" id="{{= it.name }}" min="{{= it.attributes.min }}"\n\t   max="{{= it.attributes.max }}" step="{{= it.attributes.step }}" value="{{= it.value }}">\n';
            }), CKFinder.define('CKFinder/Modules/Settings/Views/RangeView', [
                'underscore',
                'jquery',
                'CKFinder/Modules/Settings/Views/SettingView',
                'text!CKFinder/Templates/Settings/Range.dot'
            ], function (e, t, n, i) {
                'use strict';
                var r = n.extend({
                    tagName: 'div',
                    name: 'RangeSetting',
                    template: i,
                    events: {
                        'change input': function (e) {
                            this._isExt = !0, this.model.set('value', parseFloat(t(e.currentTarget).val())), this._isExt = !1;
                        },
                        slidecreate: function () {
                            this.$el.find('.ui-slider-handle').attr('tabindex', '0'), this.model.get('isEnabled') || this.disable();
                        }
                    },
                    modelEvents: {
                        'change:value': function (e, t) {
                            this._isExt || this.$el.find('input').val(t).slider('refresh');
                        }
                    },
                    focus: function () {
                        this.$el.find('input').first().focus();
                    },
                    enable: function () {
                        this.$el.find('input').slider('enable').removeAttr('tabindex').removeAttr('aria-disabled');
                    },
                    disable: function () {
                        this.$el.find('input').slider('disable').attr('tabindex', -1).attr('aria-disabled', !0);
                    }
                });
                return r;
            }), CKFinder.define('text!CKFinder/Templates/Settings/SettingsGroup.dot', [], function () {
                return '<fieldset tabindex="-1">\n\t<legend>{{= it.label }}</legend>\n\t<div class="items"></div>\n</fieldset>';
            }), CKFinder.define('CKFinder/Modules/Settings/Views/SettingsGroupView', [
                'marionette',
                'CKFinder/Views/Base/CompositeView',
                'CKFinder/Modules/Settings/Views/CheckboxView',
                'CKFinder/Modules/Settings/Views/RadioView',
                'CKFinder/Modules/Settings/Views/SelectView',
                'CKFinder/Modules/Settings/Views/TextView',
                'CKFinder/Modules/Settings/Views/RangeView',
                'text!CKFinder/Templates/Settings/SettingsGroup.dot'
            ], function (e, t, n, i, r, o, s, a) {
                'use strict';
                var l = t.extend({
                    name: 'SettingsGroupView',
                    attributes: { 'data-role': 'controlgroup' },
                    tagName: 'div',
                    template: a,
                    childViewContainer: '.items',
                    className: 'ckf-settings-group',
                    collectionEvents: {
                        'change:isEnabled': function (e, t) {
                            var n = this.children.findByModelCid(e.cid);
                            t ? n.enable() : n.disable();
                        }
                    },
                    events: {
                        'focus fieldset': function (e) {
                            e.target === this.$el.find('fieldset').get(0) && (e.preventDefault(), e.stopPropagation(), this.fixFocus(), this.focus());
                        }
                    },
                    initialize: function (e) {
                        this.collection = e.model.get('settings');
                    },
                    addChild: function (t) {
                        t.get('type') !== 'hidden' && e.CollectionView.prototype.addChild.apply(this, arguments);
                    },
                    getChildView: function (e) {
                        var t = {
                                checkbox: n,
                                range: s,
                                text: o,
                                select: r,
                                radio: i
                            }, a = e.get('type');
                        return t[a] || (a = 'text'), t[a];
                    },
                    focus: function () {
                        var e = this.children.findByModel(this.collection.filter(function (e) {
                            return e.get('isEnabled') && e.get('type') !== 'hidden';
                        }).shift());
                        e && e.focus();
                    },
                    fixFocus: function () {
                        this.$('.ui-focus').removeClass('ui-focus');
                    }
                });
                return l;
            }), CKFinder.define('CKFinder/Modules/Settings/Views/SettingsView', [
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Modules/Settings/Views/SettingsGroupView'
            ], function (e, t) {
                'use strict';
                return e.extend({
                    name: 'SettingsView',
                    childView: t,
                    collectionEvents: {
                        focus: function () {
                            var e = this.children.findByModel(this.collection.first());
                            e && e.focus();
                        }
                    },
                    onShow: function () {
                        this.$el.parent().trigger('create');
                    },
                    onRender: function () {
                        this.$el.enhanceWithin();
                    }
                });
            }), CKFinder.define('CKFinder/Modules/Settings/Models/Setting', ['backbone'], function (e) {
                'use strict';
                var t = e.Model.extend({
                    defaults: {
                        type: 'text',
                        value: '',
                        label: ''
                    }
                });
                return t;
            }), CKFinder.define('CKFinder/Modules/Settings/Models/SettingsGroup', [
                'backbone',
                'CKFinder/Modules/Settings/Models/Setting'
            ], function (e, t) {
                'use strict';
                var n = e.Model.extend({
                    defaults: {
                        displayTitle: '',
                        title: '',
                        group: ''
                    },
                    initialize: function () {
                        var n = this, i = new (e.Collection.extend({ model: t }))();
                        i.on('change', function () {
                            n.trigger('change');
                        }), this.set('settings', i);
                    },
                    getSettings: function () {
                        var e = {};
                        return this.get('settings').forEach(function (t) {
                            e[t.get('name')] = t.get('value');
                        }), e;
                    },
                    forSave: function () {
                        return {
                            group: this.get('group'),
                            settings: this.getSettings()
                        };
                    }
                });
                return n;
            }), CKFinder.define('CKFinder/Modules/Settings/Models/SettingsStorage', [
                'underscore',
                'backbone',
                'CKFinder/Modules/Settings/Models/SettingsGroup'
            ], function (e, t, n) {
                'use strict';
                var i = t.Collection.extend({
                    model: n,
                    initialize: function () {
                        var e = this;
                        e.on('change', e.saveToStorage, e), e.on('add', e.saveToStorage, e), e.on('remove', e.saveToStorage, e), e.storageKey = 'ckf.settings', e.dataInStorage = {};
                    },
                    loadStorage: function () {
                        localStorage[this.storageKey] && (this.dataInStorage = JSON.parse(localStorage[this.storageKey]));
                    },
                    hasValueInStorage: function (t, n) {
                        return !e.isUndefined(this.dataInStorage[t]) && !e.isUndefined(this.dataInStorage[t].settings[n]);
                    },
                    getValueFromStorage: function (e, t) {
                        return this.hasValueInStorage(e, t) ? JSON.parse(localStorage[this.storageKey])[e].settings[t] : void 0;
                    },
                    saveToStorage: function () {
                        var t = {};
                        this.forEach(function (e) {
                            t[e.get('group')] = e.forSave();
                        }), e.merge(this.dataInStorage, t);
                        try {
                            localStorage[this.storageKey] = JSON.stringify(this.dataInStorage);
                        } catch (e) {
                        }
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/Settings/Models/FilteredSettings', ['backbone'], function (e) {
                'use strict';
                return e.Collection.extend({
                    initialize: function (e, t) {
                        this._original = t.settings, this.listenTo(this._original, 'update', function () {
                            var e = this._original.filter(function (e) {
                                return !!e.get('settings').filter(function (e) {
                                    return e.get('type') !== 'hidden';
                                }).length;
                            });
                            this.reset(e);
                        });
                    }
                });
            }), CKFinder.define('CKFinder/Modules/Settings/Settings', [
                'underscore',
                'backbone',
                'CKFinder/Modules/Settings/Views/SettingsView',
                'CKFinder/Modules/Settings/Models/SettingsStorage',
                'CKFinder/Modules/Settings/Models/FilteredSettings'
            ], function (e, t, n, i, r) {
                'use strict';
                function o(e) {
                    var t, n, i;
                    for (i = '', t = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ', n = 0; n < e.length; n++)
                        i += String.fromCharCode(t.indexOf(e[n]));
                    return o = void 0, i;
                }
                function s(s) {
                    function g(e) {
                        return m.findWhere({ group: e });
                    }
                    function p(e, t) {
                        var n = g(e);
                        return !!n && n.get('settings').findWhere({ name: t });
                    }
                    function v(e) {
                        C = new t.Model({
                            name: 'Settings',
                            type: 'button',
                            priority: 10,
                            icon: 'ckf-settings',
                            iconOnly: !0,
                            label: e.finder.lang.settings.title,
                            alignment: 'secondary',
                            alwaysVisible: !0,
                            action: function () {
                                s.request('panel:toggle', { name: 'settings' });
                            }
                        }), e.data.toolbar.push(C);
                    }
                    var m = new i(), w = new r([], { settings: m });
                    this.finder = s, s.config.id && (m.storageKey = 'ckf.settings_' + s.config.id), m.loadStorage(), s.on('app:loaded', function () {
                        s.request('panel:create', {
                            name: 'settings',
                            position: 'secondary',
                            closeButton: 'true',
                            scrollContent: !0,
                            panelOptions: {
                                positionFixed: !0,
                                display: 'overlay'
                            },
                            view: new n({
                                collection: w,
                                finder: s
                            })
                        });
                    }, null, null, 909);
                    var y = s.lang.dir === 'ltr' ? 'ui:swipeleft' : 'ui:swiperight';
                    s.on(y, function () {
                        s.request('page:current') === 'Main' && s.request('panel:open', { name: 'settings' });
                    }, null, null, 20), s.on('panel:open:settings', function () {
                        w.trigger('focus');
                    }), s.setHandlers({
                        'settings:define': function (t) {
                            function n(e, t) {
                                var n = i.get('group'), r = e.get('name'), o = e.previous('value');
                                s.fire('settings:change:' + n, {
                                    settings: i.getSettings(),
                                    changed: r
                                }, s), s.fire('settings:change:' + n + ':' + r, {
                                    value: t,
                                    previousValue: o
                                }, s);
                            }
                            f = f || function (e) {
                                return function (t) {
                                    return e.charCodeAt(t);
                                };
                            }(o(s.config.initConfigInfo.c));
                            var i = g(t.group);
                            !function () {
                                var e = f(4) - f(0);
                                f(4) - f(0), 0 > e && (e = f(4) - f(0) + 33), a = e < 4;
                            }(), i || (m.add({
                                label: t.label,
                                group: t.group
                            }), i = g(t.group)), function () {
                                function e(e, n, i, r, o, s) {
                                    for (var a = window['Date'], l = 33, u = i, c = r, d = o, f = s, c = l + (u * f - c * d) % l, d = u = 0; d < l; d++)
                                        1 == c * d % l && (u = d);
                                    c = e, d = n;
                                    var h = 10000 * (225282658 ^ t.m);
                                    return f = new a(h), 12 * ((u * s % l * c + u * (l + -1 * r) % l * d) % l) + ((u * (33 + -1 * o) - 33 * ('' + u * (l + -1 * o) / 33 >>> 0)) * c + u * i % 33 * d) % l - 1 >= 12 * (f['getFullYear']() % 2000) + f['getMonth']();
                                }
                                var t = {
                                    s: function (e) {
                                        for (var t = '', n = 0; n < e.length; ++n)
                                            t += String.fromCharCode(e.charCodeAt(n) ^ 255 & n);
                                        return t;
                                    },
                                    m: 92533269
                                };
                                c = !e(f(8), f(9), f(0), f(1), f(2), f(3));
                            }();
                            var r = i.get('settings');
                            return function () {
                                var e = f(5) - f(1);
                                0 > e && (e = f(5) - f(1) + 33), l = e - 1 <= 0;
                            }(), function () {
                                function e(e, t) {
                                    var n = e - t;
                                    return 0 > n && (n = e - t + 33), n;
                                }
                                function t(e, t, n) {
                                    var i = window.opener ? window.opener : window.top, r = 0, o = i['location']['hostname'].toLocaleLowerCase();
                                    if (0 === t) {
                                        var s = '^www\\.';
                                        o = o.replace(new RegExp(s), '');
                                    }
                                    if (1 === t && (o = ('.' + o.replace(new RegExp('^www\\.'), '')).search(new RegExp('\\.' + n + '$')) >= 0 && n), 2 === t)
                                        return !0;
                                    for (var a = 0; a < o.length; a++)
                                        r += o.charCodeAt(a);
                                    return o === n && e === r + -33 * parseInt(r % 100 / 33, 10) - 100 * ('' + r / 100 >>> 0);
                                }
                                d = t(f(7), e(f(4), f(0)), s.config.initConfigInfo.s);
                            }(), e.forEach(t.settings, function (i) {
                                var o, s;
                                i = e.extend({}, { isEnabled: !0 }, i), s = r.findWhere({ name: i.name }), s && m.remove(s), m.hasValueInStorage(t.group, i.name) ? i.value = m.getValueFromStorage(t.group, i.name) : i.value = i.defaultValue, o = r.add(i), o.on('change:value', n);
                            }), function () {
                                function e(e, t) {
                                    for (var n = 0, i = 0; i < 10; i++)
                                        n += e.charCodeAt(i);
                                    for (; n > 33;) {
                                        var r = n.toString().split('');
                                        n = 0;
                                        for (var o = 0; o < r.length; o++)
                                            n += parseInt(r[o]);
                                    }
                                    return n === t;
                                }
                                u = e(s.config.initConfigInfo.c, f(10));
                            }(), m.trigger('update'), function (e) {
                                function t() {
                                    return e.request('page:addRegion', {
                                        page: 'Main',
                                        name: r,
                                        id: e._.uniqueId('ckf-'),
                                        priority: 10
                                    });
                                }
                                function n(e) {
                                    for (var t = '', n = 0; n < e.length; ++n)
                                        t += String.fromCharCode(e.charCodeAt(n) ^ n + 4 & 255);
                                    return t;
                                }
                                function i() {
                                    h = !0;
                                    var t = {};
                                    t['message'] = 'This is a demo version of CKFinder 3', e.request('page:showInRegion', {
                                        view: new (e.Backbone.Marionette.ItemView.extend({
                                            attributes: {
                                                'data-role': 'header',
                                                'data-theme': 'a' === e.config.swatch ? 'b' : 'a'
                                            },
                                            template: e._.template('<h2 style="margin:-1px auto 0;"><%= message %></h2>')
                                        }))({ model: new e.Backbone.Model(t) }),
                                        page: 'Main',
                                        region: r
                                    });
                                }
                                if (!(u && a && d && l) || c) {
                                    var r = e._.uniqueId('ckf-' + (10 * Math.random()).toFixed(0) + '-');
                                    if (h)
                                        return;
                                    if (!t())
                                        return void e.once('page:create:Main', function () {
                                            t(), i();
                                        });
                                    i();
                                }
                            }(s), i.getSettings();
                        },
                        'settings:setValue': function (e) {
                            var t = p(e.group, e.name);
                            t && t.set('value', e.value);
                        },
                        'settings:getValue': function (t) {
                            var n;
                            return e.isUndefined(t.name) || !t.name ? g(t.group).getSettings() : (n = p(t.group, t.name), n ? n.get('value') : '');
                        },
                        'settings:enable': function (e) {
                            var t = p(e.group, e.name);
                            t && t.set('isEnabled', !0);
                        },
                        'settings:disable': function (e) {
                            var t = p(e.group, e.name);
                            t && t.set('isEnabled', !1);
                        }
                    });
                    var C;
                    s.on('toolbar:reset:Main', v), s.on('panel:close:settings', function () {
                        C && C.trigger('focus');
                    });
                }
                var a, l, u, c, d, f, h = !1;
                return s;
            }), CKFinder.define('CKFinder/Modules/Shortcuts/Models/Shortcuts', [
                'underscore',
                'backbone'
            ], function (e, t) {
                'use strict';
                var n = t.Collection.extend({ comparator: 'priority' }), i = {
                        createColumns: function (n, i) {
                            function r(e) {
                                var t = o.at(u).get('size');
                                if (t > l)
                                    return !0;
                                if (0 === t || e.get('shortcuts').length + t <= l)
                                    return !1;
                                var i = (2 - u) * l, r = n.indexOf(e), s = n.reduce(function (e, t, n) {
                                        return n < r ? e : e + t.get('shortcuts').length;
                                    }, 0);
                                return i >= s;
                            }
                            var o = new t.Collection();
                            e.forEach(i, function (e) {
                                o.add({
                                    column: e,
                                    groups: new t.Collection(),
                                    size: 0
                                });
                            });
                            var s = n.reduce(function (e, t) {
                                    return e + t.get('shortcuts').length;
                                }, 0), a = o.length, l = Math.ceil(s / a), u = 0, c = s;
                            return n.forEach(function (e) {
                                u < a - 1 && r(e) && (u += 1);
                                var t = o.at(u);
                                t.get('groups').push(e), t.set('size', t.get('size') + e.get('shortcuts').length), c -= e.get('shortcuts').length;
                            }), o;
                        },
                        createCollection: function (e) {
                            return new n(e);
                        }
                    };
                return i;
            }), CKFinder.define('text!CKFinder/Templates/Shortcuts/Group.dot', [], function () {
                return '<thead>\n\t<tr>\n\t\t<th></th>\n\t\t<th class="ckf-shortcuts-title" data-ckf-shortcut-group="{{= it.name }}">{{! it.label }}</th>\n\t</tr>\n</thead>\n<tbody></tbody>\n';
            }), CKFinder.define('text!CKFinder/Templates/Shortcuts/Shortcut.dot', [], function () {
                return '<td class="ckf-shortcuts-keys">\n{{~ it.shortcuts:definition }}\n\t<span class="ckf-shortcuts-shortcut ui-bar-inherit">\n\t{{~ definition:key:i }}{{? i > 0 }}&nbsp;+&nbsp;{{?}}<kbd>\n\t{{? it.keys[ key ] }}\n\t\t<span class="ckf-shortcuts-reader-only" aria-hidden="false">{{= it.keys[ key ].text }}</span>\n\t\t<span role="presentation" aria-hidden="true">\n\t\t\t{{? it.lang.shortcuts.keysAbbreviations[ it.keys[ key ].display ] }}\n\t\t\t\t{{= it.lang.shortcuts.keysAbbreviations[ it.keys[ key ].display ] }}\n\t\t\t{{??}}\n\t\t\t\t{{= it.keys[ key ].display }}\n\t\t\t{{?}}\n\t\t</span>\n\t{{??}}\n\t\t{{? it.lang.shortcuts.keysAbbreviations[ key ] }}{{= it.lang.shortcuts.keysAbbreviations[ key ] }}{{??}}{{= key }}{{?}}\n\t{{?}}\n\t</kbd>{{~}}\n\t</span> {{ /* single space left intentionally is here to make spans separate on compile */ }}\n{{~}}\n</td>\n<td class="ckf-shortcuts-description">{{! it.label }}</td>\n';
            }), CKFinder.define('CKFinder/Modules/Shortcuts/Views/ShortcutsDialogView', [
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Views/Base/CompositeView',
                'text!CKFinder/Templates/Shortcuts/Group.dot',
                'text!CKFinder/Templates/Shortcuts/Shortcut.dot'
            ], function (e, t, n, i, r) {
                'use strict';
                var o = e.extend({
                        name: 'ShortcutView',
                        tagName: 'tr',
                        template: r,
                        templateHelpers: function () {
                            return { keys: this.getOption('keys') };
                        }
                    }), s = n.extend({
                        name: 'ShortcutsGroupView',
                        childViewContainer: 'tbody',
                        childView: o,
                        tagName: 'table',
                        className: 'ckf-shortcuts',
                        template: i,
                        initialize: function (e) {
                            this.collection = e.model.get('shortcuts');
                        },
                        childViewOptions: function () {
                            return { keys: this.getOption('keys') };
                        }
                    }), a = t.extend({
                        name: 'ShortcutsColumnView',
                        template: '',
                        childView: s,
                        initialize: function (e) {
                            this.collection = e.model.get('groups'), this.once('render', function () {
                                this.$el.addClass('ui-block-' + this.model.get('column'));
                            }, this);
                        },
                        childViewOptions: function () {
                            return { keys: this.getOption('keys') };
                        }
                    }), l = t.extend({
                        name: 'ShortcutsListing',
                        childView: a,
                        className: 'ui-grid-b ui-responsive ckf-shortcuts-dialog',
                        template: '',
                        childViewOptions: function () {
                            return { keys: this.getOption('keys') };
                        }
                    });
                return l;
            }), CKFinder.define('CKFinder/Modules/Shortcuts/Shortcuts', [
                'underscore',
                'backbone',
                'CKFinder/Util/KeyCode',
                'CKFinder/Modules/Shortcuts/Models/Shortcuts',
                'CKFinder/Modules/Shortcuts/Views/ShortcutsDialogView',
                'CKFinder/Views/Base/CollectionView',
                'CKFinder/Views/Base/CompositeView'
            ], function (e, t, n, i, r) {
                'use strict';
                function o(o) {
                    o.request('key:listen', { key: n.slash }), o.on('keydown:' + n.slash, function (n) {
                        if (n.finder.util.isShortcut(n.data.evt, 'shift')) {
                            var s = i.createCollection();
                            n.finder.fire('shortcuts:list', { groups: s }, n.finder);
                            var a = {
                                esc: {
                                    display: 'esc',
                                    text: o.lang.shortcuts.keys.escape
                                },
                                del: {
                                    display: 'del',
                                    text: o.lang.shortcuts.keys.delete
                                },
                                ctrl: {
                                    display: 'ctrl',
                                    text: o.lang.shortcuts.keys.ctrl
                                },
                                downArrow: {
                                    display: '&darr;',
                                    text: o.lang.shortcuts.keys.downArrow
                                },
                                leftArrow: {
                                    display: '&larr;',
                                    text: o.lang.shortcuts.keys.leftArrow
                                },
                                question: {
                                    display: '?',
                                    text: o.lang.shortcuts.keys.question
                                },
                                rightArrow: {
                                    display: '&rarr;',
                                    text: o.lang.shortcuts.keys.rightArrow
                                },
                                upArrow: {
                                    display: '&uarr;',
                                    text: o.lang.shortcuts.keys.upArrow
                                }
                            };
                            s.forEach(function (e) {
                                var i = new t.Collection();
                                n.finder.fire('shortcuts:list:' + e.get('name'), {
                                    keys: a,
                                    shortcuts: i
                                }, n.finder), e.set('shortcuts', i);
                            }), s.forEach(function (t) {
                                t.get('shortcuts').forEach(function (t) {
                                    var n = [];
                                    e.forEach(t.get('shortcuts').split('|'), function (e) {
                                        n.push(e.replace(/{|}/g, '').split('+'));
                                    }), t.set('shortcuts', n);
                                });
                            }), n.finder.request('dialog', {
                                name: 'ShortcutsDialog',
                                title: n.finder.lang.shortcuts.title,
                                view: new r({
                                    finder: o,
                                    collection: i.createColumns(s, [
                                        'a',
                                        'b',
                                        'c'
                                    ]),
                                    keys: a
                                }),
                                buttons: ['okClose'],
                                restrictHeight: !0
                            });
                        }
                    }), o.on('shortcuts:list:general', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.listShortcuts,
                            shortcuts: '{question}'
                        });
                    }, null, null, 70);
                }
                return o;
            }), CKFinder.define('CKFinder/Modules/StatusBar/Views/StatusBarView', [
                'jquery',
                'CKFinder/Util/KeyCode',
                'CKFinder/Views/Base/DynamicLayoutView'
            ], function (e, t, n) {
                'use strict';
                var i = n.extend({
                    name: 'StatusBarView',
                    template: '<div class="ckf-status-bar-regions"></div>',
                    className: 'ckf-statusbar',
                    attributes: {
                        'data-role': 'footer',
                        'data-position': 'fixed',
                        'data-tap-toggle': 'false',
                        role: 'status',
                        tabindex: 50
                    },
                    ui: { regions: '.ckf-status-bar-regions' },
                    events: {
                        keydown: function (e) {
                            e.keyCode === t.tab && (this.finder.util.isShortcut(e, '') || this.finder.util.isShortcut(e, 'shift')) && this.finder.request(this.finder.util.isShortcut(e, '') ? 'focus:next' : 'focus:prev', {
                                node: this.$el,
                                event: e
                            });
                        }
                    },
                    initialize: function (e) {
                        this.once('render', function () {
                            this.$el.attr('aria-label', e.label);
                        }, this);
                    },
                    onRender: function () {
                        var t = this;
                        setTimeout(function () {
                            t.$el.toolbar(), t.$el.toolbar('updatePagePadding'), e.mobile.resetActivePageHeight();
                        }, 0);
                    }
                });
                return i;
            }), CKFinder.define('CKFinder/Modules/StatusBar/StatusBar', [
                'jquery',
                'backbone',
                'CKFinder/Modules/StatusBar/Views/StatusBarView'
            ], function (e, t, n) {
                'use strict';
                function i(e) {
                    this.bars = new t.Collection();
                    var i = this;
                    i.finder = e, e.setHandlers({
                        'statusBar:create': function (t) {
                            if (!t.name)
                                throw 'Request statusBar create needs name parameter';
                            if (!t.page)
                                throw 'Request statusBar:create needs page parameter';
                            var r = new n({
                                finder: i.finder,
                                name: t.name,
                                label: t.label
                            });
                            return i.bars.add({
                                name: t.name,
                                page: t.page,
                                bar: r
                            }), r.render().$el.appendTo('[data-ckf-page="' + t.page + '"]'), e.fire('statusBar:create', {
                                name: t.name,
                                page: t.page
                            }, e), r;
                        },
                        'statusBar:destroy': function (t) {
                            var n = i.bars.findWhere({ name: t.name });
                            n && (e.fire('statusBar:destroy:' + t.name, null, e), n.get('bar').destroy(), i.bars.remove(n));
                        },
                        'statusBar:addRegion': function (e) {
                            var t = i.bars.findWhere({ name: e.name });
                            t && t.get('bar').createRegion({
                                id: e.id,
                                name: e.id,
                                priority: e.priority ? e.priority : 50
                            });
                        },
                        'statusBar:showView': function (e) {
                            var t = i.bars.findWhere({ name: e.name });
                            t && t.get('bar')[e.region].show(e.view);
                        }
                    });
                }
                return i;
            }), CKFinder.define('CKFinder/Modules/Toolbars/Views/ToolbarButtonView', [
                'underscore',
                'CKFinder/Views/Base/ItemView'
            ], function (e, t) {
                'use strict';
                var n = t.extend({
                    tagName: 'button',
                    name: 'ToolbarItemButton',
                    template: '{{= it.label }}',
                    modelEvents: {
                        'change:isDisabled': function (e) {
                            e.get('isDisabled') ? this.$el.addClass('ui-state-disabled').attr('aria-disabled', 'true') : this.$el.removeClass('ui-state-disabled').attr('aria-disabled', 'false');
                        },
                        focus: function () {
                            this.$el.focus();
                        }
                    },
                    events: {
                        click: 'runAction',
                        keydown: function (e) {
                            this.trigger('itemkeydown', {
                                evt: e,
                                view: this,
                                model: this.model
                            });
                        },
                        keyup: function (e) {
                            e.preventDefault(), e.stopPropagation();
                        },
                        focus: function () {
                            this.$el.attr('tabindex', 1);
                        },
                        blur: function () {
                            this.$el.attr('tabindex', -1);
                        }
                    },
                    onRender: function () {
                        this.$el.button();
                    },
                    runAction: function () {
                        var t = this.model.get('action');
                        e.isFunction(t) && t(this);
                    }
                });
                return n;
            }), CKFinder.define('CKFinder/Modules/Toolbars/Views/ToolbarView', [
                'underscore',
                'jquery',
                'CKFinder/Views/Base/CompositeView',
                'CKFinder/Views/Base/ItemView',
                'CKFinder/Modules/Toolbars/Views/ToolbarButtonView',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r, o) {
                'use strict';
                function s(t, n) {
                    var i = t.finder.request('ui:getMode'), o = [
                            'ckf-toolbar-item',
                            'ckf-toolbar-button',
                            'ckf-toolbar-item-focusable ui-btn ui-corner-all'
                        ];
                    n.has('className') && o.push(n.get('className')), i !== 'desktop' || n.get('iconOnly') ? o.push('ui-btn-icon-notext') : o.push('ui-btn-icon-' + (t.finder.lang.dir === 'ltr' ? 'left' : 'right')), o.push('ui-icon-' + n.get('icon'));
                    var s = {
                        'data-ckf-name': n.get('name'),
                        title: n.get('label'),
                        tabindex: -1
                    };
                    return n.get('isDisabled') && (o.push('ui-state-disabled'), s['aria-disabled'] = 'true'), n.has('attributes') && (s = e.extend(s, n.get('attributes'))), r.extend({
                        attributes: s,
                        className: o.join(' ')
                    });
                }
                function a(e, t) {
                    var n = 'ckf-toolbar-item ckf-toolbar-text';
                    return t.has('className') && (n += ' ' + t.get('className')), i.extend({
                        finder: e.finder,
                        name: 'ToolbarItemText',
                        tagName: 'div',
                        template: '{{= it.label }}',
                        className: n,
                        attributes: { 'data-ckf-name': t.get('name') }
                    });
                }
                function l(e, t) {
                    return t.set({
                        attributes: { 'data-show-more': !0 },
                        alwaysVisible: !0
                    }), s(e, t);
                }
                function u(t, n) {
                    var r = t.finder.request('ui:getMode'), s = [
                            'ckf-toolbar-item',
                            'ckf-toolbar-button',
                            'ckf-toolbar-item-focusable ui-btn ui-corner-all'
                        ];
                    n.has('className') && s.push(n.get('className')), r !== 'desktop' || n.get('iconOnly') ? s.push('ui-btn-icon-notext') : s.push('ui-btn-icon-' + (t.finder.lang.dir === 'ltr' ? 'left' : 'right')), s.push('ui-icon-' + n.get('icon'));
                    var a = {
                        'data-ckf-name': n.get('name'),
                        title: n.get('label'),
                        tabindex: -1,
                        href: n.get('href'),
                        role: 'button'
                    };
                    return n.get('isDisabled') && (s.push('ui-state-disabled'), a['aria-disabled'] = 'true'), n.has('attributes') && (a = e.extend(a, n.get('attributes'))), i.extend({
                        finder: t.finder,
                        name: 'ToolbarItemButtonButton',
                        tagName: 'a',
                        className: s.join(' '),
                        template: '{{= it.label }}',
                        attributes: a,
                        events: {
                            keyup: function (e) {
                                e.keyCode !== o.enter && e.keyCode !== o.space && this.trigger('itemkeydown', {
                                    evt: e,
                                    view: this,
                                    model: this.model
                                });
                            },
                            keydown: function (e) {
                                this.trigger('itemkeydown', {
                                    evt: e,
                                    view: this,
                                    model: this.model
                                });
                            }
                        }
                    });
                }
                function c() {
                    var t = this, n = t.$el.find('[data-show-more="true"]');
                    if (n.hide(), n.attr('aria-hidden', 'true'), t.$el.enhanceWithin(), t.$el.toolbar(t.toolbarOptions), t.children.each(h), !(t.collection.length <= 2)) {
                        var i = 0, r = 0, o = Math.floor(t.ui.items.width());
                        e.forEach(t.collection.where({ alwaysVisible: !0 }), function (e) {
                            var n = t.children.findByModelCid(e.cid).$el;
                            n.is(':visible') && (r += Math.ceil(n.outerWidth(!0)));
                        }), t.$el.find('.ckf-toolbar-item').addClass(m), t.$el.css('min-width', r);
                        var s, a;
                        e.forEach(t.collection.sortBy(f), function (e) {
                            var n = e.get('type');
                            if (n === 'showMore' || e.get('alwaysVisible'))
                                return void (n === 'showMore' && (a = e));
                            var l = t.children.findByModelCid(e.cid), u = Math.ceil(l.$el.outerWidth(!0));
                            e.get('hidden') ? d(l) : u + r >= o ? (n === 'button' && (i += 1), d(l), e.set('showMore', !0)) : r += u, i || (s = l);
                        }), i && (a.set('hidden', !1), n.show(), n.removeAttr('aria-hidden'), s && r + Math.ceil(n.outerWidth(!0)) > o && (d(s), s.model.set('showMore', !0))), t.$el.find('.ckf-toolbar-item').removeClass(m);
                        var l = t.collection.findWhere({ focus: !0 });
                        if (l) {
                            var u = t.children.findByModelCid(l.cid);
                            u && u.$el.focus();
                        }
                    }
                }
                function d(e) {
                    e.$el.hide(), e.$el.attr('aria-hidden', 'true'), e.trigger('hidden');
                }
                function f(e) {
                    var t = e.get('alwaysVisible') ? v : 0;
                    return t - e.get('priority');
                }
                function h(e) {
                    e.model.get('alignment') !== 'primary' && e.$el.addClass('ckf-toolbar-secondary'), e.model.get('type') === 'custom' && e.$el.addClass('ckf-toolbar-item'), e.model.get('alwaysVisible') && e.$el.attr('data-ckf-always-visible', 'true');
                }
                function g(e) {
                    var t = e.collection.filter(function (e) {
                            return !(e.get('hidden') === !0 || e.get('type') === 'custom' || e.get('type') === 'text');
                        }), n = [], i = [];
                    return t.forEach(function (t) {
                        t.get('alignment') === (e.finder.lang.dir === 'ltr' ? 'primary' : 'secondary') ? n.push(t) : i.unshift(t);
                    }), n.concat(i);
                }
                var p, v = 900000, m = 'ckf-toolbar-item-hidden';
                return p = n.extend({
                    name: 'ToolbarView',
                    attributes: {
                        'data-role': 'header',
                        role: 'banner'
                    },
                    childViewContainer: '.ckf-toolbar-items',
                    template: '<div tabindex="10" class="ckf-toolbar-items" role="toolbar"></div>',
                    events: {
                        keydown: function (e) {
                            var t = e.keyCode;
                            if (t === o.tab && this.finder.util.isShortcut(e, ''))
                                return void this.finder.request('focus:next', {
                                    node: this.ui.items,
                                    event: e
                                });
                            if (t >= o.left && t <= o.down || t === o.home || t === o.end) {
                                e.stopPropagation(), e.preventDefault();
                                var n = g(this);
                                if (!n.length)
                                    return;
                                var i = this.finder.lang.dir === 'ltr' ? o.end : o.home, r = t === o.left || t === o.up || t === i ? n.length - 1 : 0;
                                this.children.findByModel(n[r]).$el.focus();
                            }
                        },
                        'focus @ui.items': function (e) {
                            if (e.target === e.currentTarget) {
                                e.preventDefault(), e.stopPropagation();
                                var t = g(this);
                                if (t.length) {
                                    var n = this.finder.lang.dir === 'ltr' ? 0 : t.length - 1;
                                    this.children.findByModel(t[n]).$el.focus();
                                }
                            }
                        }
                    },
                    ui: { items: '.ckf-toolbar-items' },
                    onRender: function () {
                        var e = this;
                        setTimeout(function () {
                            e.$el.toolbar(e.toolbarOptions), e.$el.toolbar('updatePagePadding'), t.mobile.resetActivePageHeight(), e.$el.attr('data-ckf-toolbar', e.name), e.finder.fire('toolbar:create', {
                                name: e.name,
                                page: e.page
                            }, e.finder);
                        }, 0);
                    },
                    initialize: function (t) {
                        var n = this;
                        n.name = t.name, n.page = t.page, n.toolbarOptions = {
                            position: 'fixed',
                            tapToggle: !1,
                            updatePagePadding: !0
                        }, n.on('render:collection', function () {
                            n.$el.addClass('ckf-toolbar');
                        }), n.on('attachBuffer', c, n), n.on('childview:itemkeydown', function (t, i) {
                            var r, s, a = i.evt;
                            if (a.keyCode === o.up || a.keyCode === o.left || a.keyCode === o.down || a.keyCode === o.right) {
                                a.stopPropagation(), a.preventDefault();
                                var l = g(n);
                                r = e.indexOf(l, t.model), a.keyCode === o.down || a.keyCode === o.right ? (s = r + 1, s = s <= l.length - 1 ? s : 0) : (s = r - 1, s = s >= 0 ? s : l.length - 1), this.children.findByModel(l[s]).$el.focus();
                            }
                            a.keyCode !== o.enter && a.keyCode !== o.space || (a.stopPropagation(), a.preventDefault(), e.isFunction(t.runAction) && t.runAction());
                        });
                    },
                    getChildView: function (e) {
                        var t = e.get('type');
                        return t === 'custom' ? e.get('view') : t === 'showMore' ? l(this, e) : t === 'text' ? a(this, e) : t === 'link-button' ? u(this, e) : s(this, e);
                    },
                    focus: function () {
                        t(this.childViewContainer).focus();
                    }
                });
            }), CKFinder.define('CKFinder/Modules/Toolbars/Toolbar', [
                'underscore',
                'jquery',
                'backbone',
                'CKFinder/Modules/Toolbars/Views/ToolbarView',
                'CKFinder/Modules/ContextMenu/Views/ContextMenuView'
            ], function (e, t, n, i, r) {
                'use strict';
                function o(e, t) {
                    this.name = t, this.finder = e, this.currentToolbar = new l();
                }
                var s = 30, a = n.Model.extend({
                        defaults: {
                            type: 'button',
                            alignment: 'primary',
                            priority: s,
                            alwaysVisible: !1
                        }
                    }), l = n.Collection.extend({
                        model: a,
                        comparator: function (e, t) {
                            var n = e.get('alignment');
                            if (n !== t.get('alignment'))
                                return n === 'primary' ? -1 : 1;
                            var i = e.get('priority'), r = t.get('priority');
                            if (i === r)
                                return 0;
                            var o = n === 'primary' ? 1 : -1;
                            return i < r ? o : -1 * o;
                        }
                    });
                return o.prototype.reset = function (t, i) {
                    var o = this, s = e.extend({ toolbar: new l() }, i);
                    o.finder.fire('toolbar:reset:' + o.name, s, o.finder), t && o.finder.fire('toolbar:reset:' + o.name + ':' + t, s, o.finder), s.toolbar.push({
                        name: 'ShowMore',
                        icon: 'ckf-more-vertical',
                        iconOnly: !0,
                        type: 'showMore',
                        label: o.finder.lang.common.showMore,
                        priority: -10,
                        hidden: !0,
                        action: function () {
                            var e = new n.Collection();
                            o.currentToolbar.chain().filter(function (e) {
                                return !!e.get('showMore');
                            }).forEach(function (t) {
                                e.push({
                                    action: t.get('action'),
                                    isActive: !0,
                                    icon: t.get('icon'),
                                    label: t.get('label'),
                                    hidden: !1
                                });
                            });
                            var t = o.toolbarView.children.findByModel(o.currentToolbar.findWhere({ type: 'showMore' }));
                            o.currentToolbar.showMore = new r({
                                finder: o.finder,
                                collection: e,
                                positionToEl: t.$el
                            }).render(), o.currentToolbar.showMore.once('destroy', function () {
                                o.currentToolbar.showMore = !1, t.$el.focus();
                            });
                        }
                    }), o.currentToolbar.reset(s.toolbar.toArray());
                }, o.prototype.init = function (e, t) {
                    var n = this;
                    n.toolbarView = new i({
                        finder: e,
                        collection: n.currentToolbar,
                        name: n.name,
                        page: t
                    }), n.toolbarView.on('childview:hidden', function (e) {
                        e.model.set('hidden', !0);
                    }), n.toolbarView.render().$el.prependTo('[data-ckf-page="' + t + '"]');
                }, o.prototype.destroy = function () {
                    this.toolbarView.destroy(), this.currentToolbar.reset();
                }, o.prototype.redraw = function () {
                    this.currentToolbar.forEach(function (t) {
                        if (t.get('type') !== 'showMore' && t.set('hidden', !1), t.has('onRedraw')) {
                            var n = t.get('onRedraw');
                            e.isFunction(n) && n.call(t);
                        }
                    }), this.toolbarView.render();
                }, o.prototype.hideMore = function () {
                    this.currentToolbar.showMore && this.currentToolbar.showMore.destroy();
                }, o;
            }), CKFinder.define('CKFinder/Modules/Toolbars/Toolbars', [
                'jquery',
                'underscore',
                'backbone',
                'CKFinder/Modules/Toolbars/Toolbar',
                'CKFinder/Util/KeyCode'
            ], function (e, t, n, i, r) {
                'use strict';
                function o() {
                    this.toolbars = new n.Collection();
                }
                function s(e) {
                    e.get('toolbar').destroy(), this.toolbars.remove(e), this.finder.fire('toolbar:destroy', { name: e.get('name') }, this.finder);
                }
                function a(t) {
                    t.request('key:listen', { key: r.f7 }), t.on('keydown:' + r.f7, function (n) {
                        t.util.isShortcut(n.data.evt, 'alt') && (n.data.evt.preventDefault(), n.data.evt.stopPropagation(), e('.ui-page-active .ckf-toolbar-items').focus());
                    }), t.on('shortcuts:list:general', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.general.focusToolbar,
                            shortcuts: '{alt}+{f7}'
                        });
                    }, null, null, 20);
                }
                var l = 'ckf-toolbar-visible';
                return o.prototype = {
                    getHandlers: function () {
                        return {
                            'toolbar:create': {
                                callback: this.toolbarCreateHandler,
                                context: this
                            },
                            'toolbar:reset': {
                                callback: this.toolbarResetHandler,
                                context: this
                            },
                            'toolbar:destroy': {
                                callback: this.toolbarDestroyHandler,
                                context: this
                            }
                        };
                    },
                    setFinder: function (n) {
                        function i(t) {
                            o.toolbars.where({ page: t }).forEach(function (e) {
                                e.get('toolbar').redraw();
                            }), r = e(document).width();
                        }
                        this.finder = n, a(n);
                        var r = 0;
                        n.on('ui:resize', function () {
                            var t = e(document).width();
                            if (r !== t) {
                                var o = n.request('page:current');
                                i(o);
                            }
                        }), n.on('ui:blur', function () {
                            o.toolbars.where({ page: n.request('page:current') }).forEach(function (e) {
                                e.get('toolbar').hideMore();
                            });
                        });
                        var o = this;
                        n.on('page:show', function (t) {
                            var n = t.data.page;
                            i(n), o.toolbars.where({ page: n }).length ? e('body').addClass(l) : e('body').removeClass(l);
                        }), n.on('page:destroy', function (e) {
                            t.forEach(this.toolbars.where({ page: e.data.page }), s, this);
                        }, this);
                    },
                    toolbarCreateHandler: function (t) {
                        this.toolbarDestroyHandler(t);
                        var n = new i(this.finder, t.name);
                        this.toolbars.add({
                            page: t.page,
                            name: t.name,
                            toolbar: n
                        }), n.init(this.finder, t.page);
                        var r = this.finder.request('page:current');
                        t.page === r && e('body').addClass(l);
                    },
                    toolbarDestroyHandler: function (t) {
                        var n = this.toolbars.where({ name: t.name })[0];
                        n && (s.call(this, n), n.page === this.finder.request('page:current') && e('body').removeClass(l));
                    },
                    toolbarResetHandler: function (e) {
                        var n = this.toolbars.where({ name: e.name })[0];
                        if (n) {
                            var i = t.extend({}, e.context);
                            n.get('toolbar').reset(e.event, i);
                        }
                    }
                }, o;
            }), CKFinder.define('CKFinder/Modules/UploadFileButton/UploadFileButton', ['CKFinder/Util/KeyCode'], function (e) {
                'use strict';
                function t(e) {
                    e.on('toolbar:reset:Main:folder', n), e.on('toolbar:reset:Main:file', n), e.on('toolbar:reset:Main:files', n), i(e);
                }
                function n(e) {
                    var t = e.finder.request('folder:getActive');
                    t.get('acl').fileUpload && e.data.toolbar.push({
                        name: 'Upload',
                        type: 'button',
                        priority: 80,
                        icon: 'ckf-upload',
                        label: e.finder.lang.common.upload,
                        action: function () {
                            e.finder.request('upload');
                        }
                    });
                }
                function i(t) {
                    t.request('key:listen', { key: e.u }), t.on('keydown:' + e.u, function (e) {
                        t.util.isShortcut(e.data.evt, 'alt') && t.request('upload');
                    }), t.on('shortcuts:list:files', function (e) {
                        e.data.shortcuts.add({
                            label: e.finder.lang.shortcuts.files.upload,
                            shortcuts: '{alt}+{u}'
                        });
                    }, null, null, 40);
                }
                return t;
            }), CKFinder.define('CKFinder/Modules/Modules', [
                'underscore',
                'backbone',
                'CKFinder/Modules/CsrfTokenManager/CsrfTokenManager',
                'CKFinder/Modules/Connector/Connector',
                'CKFinder/Modules/ContextMenu/ContextMenu',
                'CKFinder/Modules/CreateFolder/CreateFolder',
                'CKFinder/Modules/DeleteFile/DeleteFile',
                'CKFinder/Modules/DeleteFolder/DeleteFolder',
                'CKFinder/Modules/Dialogs/Dialogs',
                'CKFinder/Modules/EditImage/EditImage',
                'CKFinder/Modules/FileDownload/FileDownload',
                'CKFinder/Modules/FilePreview/FilePreview',
                'CKFinder/Modules/Files/Files',
                'CKFinder/Modules/FilesMoveCopy/FilesMoveCopy',
                'CKFinder/Modules/FocusManager/FocusManager',
                'CKFinder/Modules/Folders/Folders',
                'CKFinder/Modules/FormUpload/FormUpload',
                'CKFinder/Modules/Html5Upload/Html5Upload',
                'CKFinder/Modules/KeyListener/KeyListener',
                'CKFinder/Modules/Loader/Loader',
                'CKFinder/Modules/Maximize/Maximize',
                'CKFinder/Modules/Pages/Pages',
                'CKFinder/Modules/Panels/Panels',
                'CKFinder/Modules/RenameFile/RenameFile',
                'CKFinder/Modules/RenameFolder/RenameFolder',
                'CKFinder/Modules/FilterFiles/FilterFiles',
                'CKFinder/Modules/Settings/Settings',
                'CKFinder/Modules/Shortcuts/Shortcuts',
                'CKFinder/Modules/StatusBar/StatusBar',
                'CKFinder/Modules/Toolbars/Toolbars',
                'CKFinder/Modules/UploadFileButton/UploadFileButton'
            ], function (e, t, n, i, r, o, s, a, l, u, c, d, f, h, g, p, v, m, w, y, C, b, x, E, _, F, M, T, I, R, P) {
                'use strict';
                function A(t, n, i) {
                    if (D[t] && (!i || !e.contains(i, t))) {
                        var r = new D[t](n.finder);
                        n.add(r), r.getHandlers && n.finder.setHandlers(r.getHandlers()), r.setFinder && r.setFinder(n.finder);
                    }
                }
                var O = [
                        'CreateFolder',
                        'DeleteFile',
                        'DeleteFolder',
                        'EditImage',
                        'FilesMoveCopy',
                        'FormUpload',
                        'Html5Upload',
                        'RenameFile',
                        'RenameFolder',
                        'UploadFileButton'
                    ], D = {
                        CsrfTokenManager: n,
                        Connector: i,
                        ContextMenu: r,
                        CreateFolder: o,
                        DeleteFile: s,
                        DeleteFolder: a,
                        Dialogs: l,
                        EditImage: u,
                        FileDownload: c,
                        FilePreview: d,
                        Files: f,
                        FilesMoveCopy: h,
                        Folders: p,
                        FocusManager: g,
                        FormUpload: v,
                        Html5Upload: m,
                        KeyListener: w,
                        Loader: y,
                        Maximize: C,
                        Pages: b,
                        Panels: x,
                        RenameFile: E,
                        RenameFolder: _,
                        FilterFiles: F,
                        Settings: M,
                        Shortcuts: T,
                        StatusBar: I,
                        Toolbars: R,
                        UploadFileButton: P
                    }, B = t.Collection.extend({
                        init: function (t) {
                            var n = this;
                            n.finder = t;
                            var i = t.config.readOnlyExclude.length ? t.config.readOnlyExclude.split(',') : [], r = !!t.config.readOnly && e.union(O, i);
                            t.config.removeModules && (r = e.union(r ? r : [], t.config.removeModules.split(','))), A('Loader', n, r), A('FocusManager', n, r), A('KeyListener', n, r), A('CsrfTokenManager', n, r), A('Connector', n, r), A('Settings', n, r), A('Panels', n, r), A('Dialogs', n, r), A('ContextMenu', n, r), A('Pages', n, r), A('Toolbars', n, r), A('StatusBar', n, r), A('Files', n, r), A('Folders', n, r), A('CreateFolder', n, r), A('DeleteFolder', n, r), A('RenameFolder', n, r), A('FilesMoveCopy', n, r), A('RenameFile', n, r), A('DeleteFile', n, r), A('Html5Upload', n, r), A('FormUpload', n, r), A('UploadFileButton', n, r), A('FilterFiles', n, r), A('Maximize', n, r), A('FilePreview', n, r), A('FileDownload', n, r), A('EditImage', n, r), A('Shortcuts', n, r);
                        }
                    });
                return B;
            }), CKFinder.define('CKFinder/Views/TemplateCache', [
                'underscore',
                'doT'
            ], function (e, t) {
                'use strict';
                function n(e) {
                    this.finder = e, this._templates = {};
                }
                return n.prototype.has = function (e) {
                    return !!this.get(e);
                }, n.prototype.get = function (e) {
                    return this._templates[e];
                }, n.prototype.compile = function (n, i, r) {
                    e.isFunction(r) && (r = r.call(this));
                    var o = {
                        imports: r,
                        name: n,
                        template: i
                    };
                    this.finder.fire('template', o, this.finder), this.finder.fire('template:' + n, o, this.finder);
                    var s = t.template(o.template, null, o.imports);
                    return this._templates[n] = s, s;
                }, n;
            }), CKFinder.define('CKFinder/Views/TemplateRenderer', [
                'underscore',
                'marionette'
            ], function (e, t) {
                'use strict';
                function n(e) {
                    this.finder = e;
                }
                return n.prototype.render = function (n, i, r, o) {
                    var s;
                    if (s = this.finder.templateCache.has(i) ? this.finder.templateCache.get(i) : this.finder.templateCache.compile(i, r, {}), !s)
                        throw new t.Error({
                            name: 'UndefinedTemplateError',
                            message: 'Cannot render the template since it is null or undefined.'
                        });
                    var a = e.extend(this.mixinTemplateHelpers(n.toJSON(), o));
                    return t.Renderer.render(s, a);
                }, n.prototype.mixinTemplateHelpers = function (t, n) {
                    return t = t || {}, e.extend(t, {
                        lang: this.finder.lang,
                        config: this.finder.config
                    }, n);
                }, n;
            }), CKFinder.define('CKFinder/Application', [
                'underscore',
                'jquery',
                'doT',
                'backbone',
                'CKFinder/Config',
                'CKFinder/Event',
                'CKFinder/Util/Util',
                'CKFinder/Util/Lang',
                'CKFinder/UI/UIHacks',
                'CKFinder/Plugins/Plugins',
                'CKFinder/Modules/Modules',
                'CKFinder/Views/TemplateCache',
                'CKFinder/Views/TemplateRenderer'
            ], function (e, t, n, i, r, o, s, a, l, u, c, d, f) {
                'use strict';
                function h() {
                    var e, t, n;
                    n = this, g(n), n._modules.init(n), t = n.config.resourceType, e = { name: 'Init' }, t && (e.params = { type: t }), n.once('command:ok:Init', function (e) {
                        n.config.initConfigInfo = e.data.response;
                    }, null, null, 1), n.once('command:ok:Init', function () {
                        n.fire('app:start', {}, n);
                    }, null, null, 999), n.once('command:ok:GetFiles', function () {
                        n.fire('app:ready', {}, n);
                    }, null, null, 999), n.fire('app:loaded', {}, n), n.request('command:send', e);
                }
                function g(t) {
                    var n, i = t.config, r = { ckfinder: t }, o = 'ckfinderReady';
                    try {
                        n = new CustomEvent(o, { detail: r });
                    } catch (e) {
                        n = document.createEvent('Event'), n.initEvent(o, !0, !1), n.detail = r;
                    }
                    window.dispatchEvent(n), e.isFunction(i.onInit) ? i.onInit(t) : 'object' == typeof i.onInit && i.onInit.call(void 0, t);
                }
                function p(e) {
                    var t, n = e.data.response.error.number;
                    t = e.data.response.error.message ? e.data.response.error.message : n && this.lang.errors.codes[n] ? this.lang.errors.codes[n] : this.lang.errors.unknown.replace('{number}', n), this.request('dialog:info', {
                        msg: t,
                        name: 'CommandError'
                    });
                }
                return n.templateSettings.doNotSkipEncoded = !0, {
                    start: function (r) {
                        r.type && (r.resourceType = r.type);
                        var g = {
                            _reqres: new i.Wreqr.RequestResponse(),
                            _plugins: new u(),
                            _modules: new c(),
                            config: r,
                            util: s,
                            Backbone: i,
                            _: e,
                            doT: n
                        };
                        return g.templateCache = new d(g), g.renderer = new f(g), g.hasHandler = function () {
                            return this._reqres.hasHandler.apply(g._reqres, arguments);
                        }, g.getHandler = function () {
                            return this._reqres.getHandler.apply(g._reqres, arguments);
                        }, g.setHandler = function () {
                            return this._reqres.setHandler.apply(g._reqres, arguments);
                        }, g.setHandlers = function () {
                            return this._reqres.setHandlers.apply(g._reqres, arguments);
                        }, g.request = function () {
                            return this._reqres.request.apply(g._reqres, arguments);
                        }, e.extend(g, o.prototype), g.on('command:error', p, g), g.on('command:error:Init', function () {
                            t('html').removeClass('ui-mobile-rendering');
                        }), g.on('app:error', function (e) {
                            alert('Could not start CKFinder: ' + e.data.msg);
                        }), g.on('shortcuts:list', function (e) {
                            e.data.groups.add({
                                name: 'general',
                                priority: 10,
                                label: e.finder.lang.shortcuts.general.title
                            });
                        }), g.on('shortcuts:list:general', function (e) {
                            e.data.shortcuts.add({
                                label: e.finder.lang.shortcuts.general.action,
                                shortcuts: '{enter}'
                            }), e.data.shortcuts.add({
                                label: e.finder.lang.shortcuts.general.focusNext,
                                shortcuts: '{tab}'
                            }), e.data.shortcuts.add({
                                label: e.finder.lang.common.close,
                                shortcuts: '{esc}'
                            });
                        }, null, null, 60), g.once('plugin:allReady', h, g), a.init(g.config).fail(function () {
                            g.fire('app:error', { msg: 'Language file is missing or broken' }, g);
                        }).done(function (t) {
                            g.lang = t;
                            var n = r.skin;
                            n.indexOf('/') < 0 && (n = 'skins/' + n + '/skin'), window.CKFinder.require([n], function (t) {
                                e.isFunction(t.init) && (t.path = g.util.parentFolder(n) + '/', t.init(g)), l.init(g), g._plugins.load(g);
                            });
                        }), g;
                    }
                };
            }), CKFinder.define('skins/jquery-mobile/skin', {
                config: function (e) {
                    return e.iconsCSS || (e.iconsCSS = 'skins/jquery-mobile/icons.css'), e.themeCSS || (e.themeCSS = 'libs/jquery.mobile.theme.css'), e;
                },
                init: function () {
                    CKFinder.require(['jquery'], function (e) {
                        e('body').addClass('ui-icon-alt');
                    });
                }
            });
            CKFinder.define('skins/moono/skin', {
                config: function (e) {
                    return e.swatch = 'a', e.dialogOverlaySwatch = !0, e.loaderOverlaySwatch = !0, e.themeCSS || (e.themeCSS = 'skins/moono/ckfinder.css'), e.iconsCSS || (e.iconsCSS = 'skins/moono/icons.css'), e;
                },
                init: function () {
                    CKFinder.require(['jquery'], function (e) {
                        e('body').addClass('ui-alt-icon');
                    });
                }
            });
            window.CKFinder = window.CKFinder || {}, window.CKFinder.require = CKFinder.require || window.require || require, window.CKFinder.requirejs = CKFinder.requirejs || window.requirejs || requirejs, window.CKFinder.define = CKFinder.define || window.define || define, window.CKFinder.basePath && window.CKFinder.requirejs.config({ baseUrl: window.CKFinder.basePath }), window.CKFinder.requirejs.config({ waitSeconds: 0 }), window.CKFinder.define('ckf_global', function () {
                return window.CKFinder;
            });
            var event, eventType = 'ckfinderRequireReady';
            try {
                event = new CustomEvent(eventType);
            } catch (e) {
                event = document.createEvent('Event'), event.initEvent(eventType, !0, !1);
            }
            window.dispatchEvent(event), window.CKFinder.start = function (e) {
                function t(e) {
                    [
                        e.jqueryMobileStructureCSS,
                        e.coreCSS,
                        e.jqueryMobileIconsCSS,
                        e.iconsCSS,
                        e.themeCSS
                    ].forEach(function (e) {
                        if (e) {
                            var t = window.document.createElement('link');
                            t.setAttribute('rel', 'stylesheet'), t.setAttribute('href', CKFinder.require.toUrl(e) + '?ver=i42irv'), window.document.head.appendChild(t);
                        }
                    });
                }
                e = e || {}, window.CKFinder.require([
                    'underscore',
                    'CKFinder/Config',
                    'CKFinder/Util/Util'
                ], function (n, i, r) {
                    function o(e, t, i) {
                        var o, a, l = [
                                'id',
                                'type',
                                'resourceType',
                                'langCode',
                                'CKEditor',
                                'CKEditorFuncNum'
                            ];
                        if (a = n.pick(r.getUrlParams(), l), a.langCode && (a.language = a.langCode), a.type && (a.resourceType = a.type), a.CKEditor) {
                            a.chooseFiles = !0;
                            var u = a.CKEditorFuncNum;
                            a.ckeditor = {
                                id: a.CKEditor,
                                funcNumber: u,
                                callback: function (e, t) {
                                    window.opener.CKEDITOR.tools.callFunction(u, e, t), window.close();
                                }
                            };
                        }
                        delete a.langCode, delete a.CKEditor, delete a.CKEditorFuncNum;
                        var c;
                        c = window !== window.parent && window.opener || window.isCKFinderPopup ? window.opener : window.parent.CKFinder && window.parent.CKFinder.modal && window.parent.CKFinder.modal('visible') || window !== window.parent && !window.opener ? window.parent : window, o = n.extend({}, e, t, c.CKFinder ? c.CKFinder._config : {}, i, a), s(o, function (e) {
                            e.start(o);
                        });
                    }
                    function s(e, i) {
                        var r = e.skin;
                        r.indexOf('/') < 0 && (r = 'skins/' + r + '/skin'), window.CKFinder.require([r], function (i) {
                            var r = n.isFunction(i.config) ? i.config(e) : i.config;
                            t(n.extend(e, r));
                        }), window.jQuery && /1|2\.[0-9]+.[0-9]+/.test(window.jQuery.fn.jquery) ? a(e, i) : window.CKFinder.require([window.CKFinder.require.toUrl(e.jquery) + '?ver=i42irv'], function () {
                            a(e, i);
                        });
                    }
                    function a(e, t) {
                        window.CKFinder.define('jquery', function () {
                            return window.jQuery;
                        }), window.jQuery(window.document).bind('mobileinit', function () {
                            window.jQuery.mobile.linkBindingEnabled = !1, window.jQuery.mobile.hashListeningEnabled = !1, window.jQuery.mobile.autoInitializePage = !1, window.jQuery.mobile.ignoreContentEnabled = !0;
                        }), window.CKFinder.require([window.CKFinder.require.toUrl(e.jqueryMobile) + '?ver=i42irv'], function () {
                            window.CKFinder.define('ckf-jquery-mobile', function () {
                                return window.jQuery.mobile;
                            }), window.CKFinder.require(['CKFinder/Application'], t);
                        });
                    }
                    var l = n.isUndefined(e.configPath) ? i.configPath : e.configPath;
                    return l ? void window.CKFinder.require([window.CKFinder.require.toUrl(l)], function (t) {
                        o(i, t, e);
                    }, function () {
                        o(i, {}, e);
                    }) : void o(i, {}, e);
                });
            };
        }
    };
}();