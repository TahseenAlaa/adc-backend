<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Info</title>

    <style>
        .A4 {
            max-width: 21cm;
            max-height: 29.7cm;
            background: white;
            display: block;
            margin: 0 auto 0 auto;
        }
        /*! tailwindcss v2.2.19 | MIT License | https://tailwindcss.com*/

        /*!*! modern-normalize v1.1.0 | MIT License | https://github.com/sindresorhus/modern-normalize *!html{-webkit-text-size-adjust:100%;line-height:1.15;-moz-tab-size:4;-o-tab-size:4;tab-size:4}body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji;margin:0}hr{color:inherit;height:0}abbr[title]{-webkit-text-decoration:underline dotted;text-decoration:underline dotted}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Consolas,Liberation Mono,Menlo,monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{border-color:inherit;text-indent:0}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button}legend{padding:0}progress{vertical-align:baseline}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}button{background-color:transparent;background-image:none}fieldset,ol,ul{margin:0;padding:0}ol,ul{list-style:none}html{font-family:Nunito,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}body{font-family:inherit;line-height:inherit}*,:after,:before{border:0 solid;box-sizing:border-box}hr{border-top-width:1px}img{border-style:solid}textarea{resize:vertical}input::-moz-placeholder,textarea::-moz-placeholder{color:#9ca3af}input:-ms-input-placeholder,textarea:-ms-input-placeholder{color:#9ca3af}input::placeholder,textarea::placeholder{color:#9ca3af}[role=button],button{cursor:pointer}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}button,input,optgroup,select,textarea{color:inherit;line-height:inherit;padding:0}code,kbd,pre,samp{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{height:auto;max-width:100%}[hidden]{display:none}*,:after,:before{--tw-border-opacity:1;border-color:rgba(229,231,235,var(--tw-border-opacity))}[type=date],[type=email],[type=number],[type=password],[type=text],[type=time],[type=url],select,textarea{-webkit-appearance:none;-moz-appearance:none;appearance:none;background-color:#fff;border-color:#6b7280;border-radius:0;border-width:1px;font-size:1rem;line-height:1.5rem;padding:.5rem .75rem}[type=date]:focus,[type=email]:focus,[type=number]:focus,[type=password]:focus,[type=text]:focus,[type=time]:focus,[type=url]:focus,select:focus,textarea:focus{--tw-ring-inset:var(--tw-empty,!*!*! !*!*!);--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:#2563eb;--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);border-color:#2563eb;box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000);outline:2px solid transparent;outline-offset:2px}input::-moz-placeholder,textarea::-moz-placeholder{color:#6b7280;opacity:1}input:-ms-input-placeholder,textarea:-ms-input-placeholder{color:#6b7280;opacity:1}input::placeholder,textarea::placeholder{color:#6b7280;opacity:1}select{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3E%3C/svg%3E");background-position:right .5rem center;background-repeat:no-repeat;background-size:1.5em 1.5em;padding-right:2.5rem}[type=checkbox],select{-webkit-print-color-adjust:exact;color-adjust:exact}[type=checkbox]{-webkit-appearance:none;-moz-appearance:none;appearance:none;background-color:#fff;background-origin:border-box;border-color:#6b7280;border-radius:0;border-width:1px;color:#2563eb;display:inline-block;flex-shrink:0;height:1rem;padding:0;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;vertical-align:middle;width:1rem}[type=checkbox]:focus{--tw-ring-inset:var(--tw-empty,!*!*! !*!*!);--tw-ring-offset-width:2px;--tw-ring-offset-color:#fff;--tw-ring-color:#2563eb;--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000);outline:2px solid transparent;outline-offset:2px}[type=checkbox]:checked{background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg viewBox='0 0 16 16' fill='%23fff' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12.207 4.793a1 1 0 0 1 0 1.414l-5 5a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L6.5 9.086l4.293-4.293a1 1 0 0 1 1.414 0z'/%3E%3C/svg%3E");background-position:50%;background-repeat:no-repeat;background-size:100% 100%}[type=checkbox]:checked,[type=checkbox]:checked:focus,[type=checkbox]:checked:hover{background-color:currentColor;border-color:transparent}[type=checkbox]:indeterminate{background-color:currentColor;background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3E%3Cpath stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3E%3C/svg%3E");background-position:50%;background-repeat:no-repeat;background-size:100% 100%;border-color:transparent}[type=checkbox]:indeterminate:focus,[type=checkbox]:indeterminate:hover{background-color:currentColor;border-color:transparent}.container{width:100%}@media (min-width:640px){.container{max-width:640px}}@media (min-width:768px){.container{max-width:768px}}@media (min-width:1024px){.container{max-width:1024px}}@media (min-width:1280px){.container{max-width:1280px}}@media (min-width:1536px){.container{max-width:1536px}}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.top-0{top:0}.right-0{right:0}.left-0{left:0}.z-50{z-index:50}.m-0{margin:0}.m-2{margin:.5rem}.m-6{margin:1.5rem}.mx-2{margin-left:.5rem;margin-right:.5rem}.mx-3{margin-left:.75rem;margin-right:.75rem}.mx-10{margin-left:2.5rem;margin-right:2.5rem}.mx-auto{margin-left:auto;margin-right:auto}.my-0{margin-bottom:0;margin-top:0}.my-2{margin-bottom:.5rem;margin-top:.5rem}.my-3{margin-bottom:.75rem;margin-top:.75rem}.mt-1{margin-top:.25rem}.mt-2{margin-top:.5rem}.mt-3{margin-top:.75rem}.mt-4{margin-top:1rem}.mt-5{margin-top:1.25rem}.mt-6{margin-top:1.5rem}.mt-8{margin-top:2rem}.mt-16{margin-top:4rem}.mt-24{margin-top:6rem}.mt-32{margin-top:8rem}.-mt-px{margin-top:-1px}.mr-2{margin-right:.5rem}.mr-5{margin-right:1.25rem}.mr-60{margin-right:15rem}.-mr-2{margin-right:-.5rem}.mb-0{margin-bottom:0}.mb-2{margin-bottom:.5rem}.mb-4{margin-bottom:1rem}.mb-8{margin-bottom:2rem}.mb-10{margin-bottom:2.5rem}.ml-1{margin-left:.25rem}.ml-2{margin-left:.5rem}.ml-3{margin-left:.75rem}.ml-4{margin-left:1rem}.ml-6{margin-left:1.5rem}.ml-12{margin-left:3rem}.ml-60{margin-left:15rem}.block{display:block}.flex{display:flex}.inline-flex{display:inline-flex}.table{display:table}.grid{display:grid}.hidden{display:none}.h-4{height:1rem}.h-5{height:1.25rem}.h-6{height:1.5rem}.h-8{height:2rem}.h-10{height:2.5rem}.h-16{height:4rem}.h-20{height:5rem}.h-screen{height:100vh}.min-h-screen{min-height:100vh}.w-4{width:1rem}.w-5{width:1.25rem}.w-6{width:1.5rem}.w-8{width:2rem}.w-10{width:2.5rem}.w-20{width:5rem}.w-48{width:12rem}.w-auto{width:auto}.w-1\/3{width:33.333333%}.w-5\/6{width:83.333333%}.w-full{width:100%}.max-w-3xl{max-width:48rem}.max-w-4xl{max-width:56rem}.max-w-6xl{max-width:72rem}.max-w-7xl{max-width:80rem}.max-w-full{max-width:100%}.max-w-screen-md{max-width:768px}.flex-shrink-0{flex-shrink:0}.flex-grow{flex-grow:1}.origin-top{transform-origin:top}.origin-top-right{transform-origin:top right}.origin-top-left{transform-origin:top left}.transform{--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;transform:translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-95{--tw-scale-x:.95;--tw-scale-y:.95}.scale-100{--tw-scale-x:1;--tw-scale-y:1}@-webkit-keyframes spin{to{transform:rotate(1turn)}}@keyframes spin{to{transform:rotate(1turn)}}@-webkit-keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@-webkit-keyframes pulse{50%{opacity:.5}}@keyframes pulse{50%{opacity:.5}}@-webkit-keyframes bounce{0%,to{-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@keyframes bounce{0%,to{-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}.cursor-default{cursor:default}.cursor-pointer{cursor:pointer}.list-inside{list-style-position:inside}.list-disc{list-style-type:disc}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.flex-row{flex-direction:row}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.place-items-center{place-items:center}.items-end{align-items:flex-end}.items-center{align-items:center}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.justify-around{justify-content:space-around}.space-x-8>:not([hidden])~:not([hidden]){--tw-space-x-reverse:0;margin-left:calc(2rem*(1 - var(--tw-space-x-reverse)));margin-right:calc(2rem*var(--tw-space-x-reverse))}.space-y-1>:not([hidden])~:not([hidden]){--tw-space-y-reverse:0;margin-bottom:calc(.25rem*var(--tw-space-y-reverse));margin-top:calc(.25rem*(1 - var(--tw-space-y-reverse)))}.divide-x>:not([hidden])~:not([hidden]){--tw-divide-x-reverse:0;border-left-width:calc(1px*(1 - var(--tw-divide-x-reverse)));border-right-width:calc(1px*var(--tw-divide-x-reverse))}.divide-y>:not([hidden])~:not([hidden]){--tw-divide-y-reverse:0;border-bottom-width:calc(1px*var(--tw-divide-y-reverse));border-top-width:calc(1px*(1 - var(--tw-divide-y-reverse)))}.divide-gray-200>:not([hidden])~:not([hidden]){--tw-divide-opacity:1;border-color:rgba(229,231,235,var(--tw-divide-opacity))}.divide-gray-300>:not([hidden])~:not([hidden]){--tw-divide-opacity:1;border-color:rgba(209,213,219,var(--tw-divide-opacity))}.overflow-hidden{overflow:hidden}.overflow-x-auto{overflow-x:auto}.whitespace-nowrap{white-space:nowrap}.rounded{border-radius:.25rem}.rounded-md{border-radius:.375rem}.rounded-lg{border-radius:.5rem}.rounded-full{border-radius:9999px}.border-0{border-width:0}.border{border-width:1px}.border-t{border-top-width:1px}.border-b-2{border-bottom-width:2px}.border-b{border-bottom-width:1px}.border-l-4{border-left-width:4px}.border-transparent{border-color:transparent}.border-gray-100{--tw-border-opacity:1;border-color:rgba(243,244,246,var(--tw-border-opacity))}.border-gray-200{--tw-border-opacity:1;border-color:rgba(229,231,235,var(--tw-border-opacity))}.border-gray-300{--tw-border-opacity:1;border-color:rgba(209,213,219,var(--tw-border-opacity))}.border-gray-900{--tw-border-opacity:1;border-color:rgba(17,24,39,var(--tw-border-opacity))}.border-indigo-400{--tw-border-opacity:1;border-color:rgba(129,140,248,var(--tw-border-opacity))}.border-indigo-500{--tw-border-opacity:1;border-color:rgba(99,102,241,var(--tw-border-opacity))}.focus\:border-gray-300:focus,.hover\:border-gray-300:hover{--tw-border-opacity:1;border-color:rgba(209,213,219,var(--tw-border-opacity))}.focus\:border-gray-900:focus{--tw-border-opacity:1;border-color:rgba(17,24,39,var(--tw-border-opacity))}.focus\:border-blue-300:focus{--tw-border-opacity:1;border-color:rgba(147,197,253,var(--tw-border-opacity))}.focus\:border-indigo-300:focus{--tw-border-opacity:1;border-color:rgba(165,180,252,var(--tw-border-opacity))}.focus\:border-indigo-700:focus{--tw-border-opacity:1;border-color:rgba(67,56,202,var(--tw-border-opacity))}.bg-black{--tw-bg-opacity:1;background-color:rgba(0,0,0,var(--tw-bg-opacity))}.bg-white{--tw-bg-opacity:1;background-color:rgba(255,255,255,var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity:1;background-color:rgba(243,244,246,var(--tw-bg-opacity))}.bg-gray-200{--tw-bg-opacity:1;background-color:rgba(229,231,235,var(--tw-bg-opacity))}.bg-gray-300{--tw-bg-opacity:1;background-color:rgba(209,213,219,var(--tw-bg-opacity))}.bg-gray-400{--tw-bg-opacity:1;background-color:rgba(156,163,175,var(--tw-bg-opacity))}.bg-gray-500{--tw-bg-opacity:1;background-color:rgba(107,114,128,var(--tw-bg-opacity))}.bg-gray-700{--tw-bg-opacity:1;background-color:rgba(55,65,81,var(--tw-bg-opacity))}.bg-gray-800{--tw-bg-opacity:1;background-color:rgba(31,41,55,var(--tw-bg-opacity))}.bg-gray-900{--tw-bg-opacity:1;background-color:rgba(17,24,39,var(--tw-bg-opacity))}.bg-red-200{--tw-bg-opacity:1;background-color:rgba(254,202,202,var(--tw-bg-opacity))}.bg-indigo-50{--tw-bg-opacity:1;background-color:rgba(238,242,255,var(--tw-bg-opacity))}.bg-indigo-200{--tw-bg-opacity:1;background-color:rgba(199,210,254,var(--tw-bg-opacity))}.bg-indigo-500{--tw-bg-opacity:1;background-color:rgba(99,102,241,var(--tw-bg-opacity))}.bg-indigo-600{--tw-bg-opacity:1;background-color:rgba(79,70,229,var(--tw-bg-opacity))}.hover\:bg-gray-50:hover{--tw-bg-opacity:1;background-color:rgba(249,250,251,var(--tw-bg-opacity))}.hover\:bg-gray-100:hover{--tw-bg-opacity:1;background-color:rgba(243,244,246,var(--tw-bg-opacity))}.hover\:bg-gray-200:hover{--tw-bg-opacity:1;background-color:rgba(229,231,235,var(--tw-bg-opacity))}.hover\:bg-gray-700:hover{--tw-bg-opacity:1;background-color:rgba(55,65,81,var(--tw-bg-opacity))}.hover\:bg-indigo-600:hover{--tw-bg-opacity:1;background-color:rgba(79,70,229,var(--tw-bg-opacity))}.hover\:bg-indigo-700:hover{--tw-bg-opacity:1;background-color:rgba(67,56,202,var(--tw-bg-opacity))}.focus\:bg-gray-50:focus{--tw-bg-opacity:1;background-color:rgba(249,250,251,var(--tw-bg-opacity))}.focus\:bg-gray-100:focus{--tw-bg-opacity:1;background-color:rgba(243,244,246,var(--tw-bg-opacity))}.focus\:bg-indigo-100:focus{--tw-bg-opacity:1;background-color:rgba(224,231,255,var(--tw-bg-opacity))}.bg-gradient-to-r{background-image:linear-gradient(to right,var(--tw-gradient-stops))}.from-gray-200{--tw-gradient-from:#e5e7eb;--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,rgba(229,231,235,0))}.via-gray-300{--tw-gradient-stops:var(--tw-gradient-from),#d1d5db,var(--tw-gradient-to,rgba(209,213,219,0))}.to-gray-400{--tw-gradient-to:#9ca3af}.fill-current{fill:currentColor}.object-cover{-o-object-fit:cover;object-fit:cover}.object-center{-o-object-position:center;object-position:center}.p-0{padding:0}.p-1{padding:.25rem}.p-2{padding:.5rem}.p-3{padding:.75rem}.p-4{padding:1rem}.p-6{padding:1.5rem}.p-10{padding:2.5rem}.p-0\.5{padding:.125rem}.px-1{padding-left:.25rem;padding-right:.25rem}.px-3{padding-left:.75rem;padding-right:.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-5{padding-left:1.25rem;padding-right:1.25rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.px-10{padding-left:2.5rem;padding-right:2.5rem}.px-12{padding-left:3rem;padding-right:3rem}.px-16{padding-left:4rem;padding-right:4rem}.px-24{padding-left:6rem;padding-right:6rem}.py-1{padding-bottom:.25rem;padding-top:.25rem}.py-2{padding-bottom:.5rem;padding-top:.5rem}.py-3{padding-bottom:.75rem;padding-top:.75rem}.py-4{padding-bottom:1rem;padding-top:1rem}.py-6{padding-bottom:1.5rem;padding-top:1.5rem}.py-10{padding-bottom:2.5rem;padding-top:2.5rem}.py-12{padding-bottom:3rem;padding-top:3rem}.py-24{padding-bottom:6rem;padding-top:6rem}.pt-1{padding-top:.25rem}.pt-2{padding-top:.5rem}.pt-4{padding-top:1rem}.pt-6{padding-top:1.5rem}.pt-8{padding-top:2rem}.pt-12{padding-top:3rem}.pr-3{padding-right:.75rem}.pr-4{padding-right:1rem}.pr-5{padding-right:1.25rem}.pb-1{padding-bottom:.25rem}.pb-3{padding-bottom:.75rem}.pl-1{padding-left:.25rem}.pl-2{padding-left:.5rem}.pl-3{padding-left:.75rem}.pl-5{padding-left:1.25rem}.text-center{text-align:center}.align-baseline{vertical-align:baseline}.font-sans{font-family:Nunito,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji}.text-xs{font-size:.75rem;line-height:1rem}.text-sm{font-size:.875rem;line-height:1.25rem}.text-base{font-size:1rem;line-height:1.5rem}.text-lg{font-size:1.125rem}.text-lg,.text-xl{line-height:1.75rem}.text-xl{font-size:1.25rem}.text-2xl{font-size:1.5rem;line-height:2rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}.font-medium{font-weight:500}.font-semibold{font-weight:600}.font-bold{font-weight:700}.uppercase{text-transform:uppercase}.capitalize{text-transform:capitalize}.leading-5{line-height:1.25rem}.leading-7{line-height:1.75rem}.leading-tight{line-height:1.25}.leading-relaxed{line-height:1.625}.tracking-widest{letter-spacing:.1em}.text-black{--tw-text-opacity:1;color:rgba(0,0,0,var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgba(255,255,255,var(--tw-text-opacity))}.text-gray-100{--tw-text-opacity:1;color:rgba(243,244,246,var(--tw-text-opacity))}.text-gray-200{--tw-text-opacity:1;color:rgba(229,231,235,var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity:1;color:rgba(209,213,219,var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity:1;color:rgba(156,163,175,var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity:1;color:rgba(107,114,128,var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity:1;color:rgba(75,85,99,var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity:1;color:rgba(55,65,81,var(--tw-text-opacity))}.text-gray-800{--tw-text-opacity:1;color:rgba(31,41,55,var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity:1;color:rgba(17,24,39,var(--tw-text-opacity))}.text-red-500{--tw-text-opacity:1;color:rgba(239,68,68,var(--tw-text-opacity))}.text-red-600{--tw-text-opacity:1;color:rgba(220,38,38,var(--tw-text-opacity))}.text-red-700{--tw-text-opacity:1;color:rgba(185,28,28,var(--tw-text-opacity))}.text-green-600{--tw-text-opacity:1;color:rgba(5,150,105,var(--tw-text-opacity))}.text-indigo-600{--tw-text-opacity:1;color:rgba(79,70,229,var(--tw-text-opacity))}.text-indigo-700{--tw-text-opacity:1;color:rgba(67,56,202,var(--tw-text-opacity))}.hover\:text-gray-50:hover{--tw-text-opacity:1;color:rgba(249,250,251,var(--tw-text-opacity))}.hover\:text-gray-500:hover{--tw-text-opacity:1;color:rgba(107,114,128,var(--tw-text-opacity))}.hover\:text-gray-700:hover{--tw-text-opacity:1;color:rgba(55,65,81,var(--tw-text-opacity))}.hover\:text-gray-800:hover{--tw-text-opacity:1;color:rgba(31,41,55,var(--tw-text-opacity))}.hover\:text-gray-900:hover{--tw-text-opacity:1;color:rgba(17,24,39,var(--tw-text-opacity))}.focus\:text-gray-500:focus{--tw-text-opacity:1;color:rgba(107,114,128,var(--tw-text-opacity))}.focus\:text-gray-700:focus{--tw-text-opacity:1;color:rgba(55,65,81,var(--tw-text-opacity))}.focus\:text-gray-800:focus{--tw-text-opacity:1;color:rgba(31,41,55,var(--tw-text-opacity))}.focus\:text-indigo-800:focus{--tw-text-opacity:1;color:rgba(55,48,163,var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.opacity-0{opacity:0}.opacity-100{opacity:1}.disabled\:opacity-25:disabled{opacity:.25}*,:after,:before{--tw-shadow:0 0 #0000}.shadow-sm{--tw-shadow:0 1px 2px 0 rgba(0,0,0,.05)}.shadow,.shadow-sm{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.shadow{--tw-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.shadow-md{--tw-shadow:0 4px 6px -1px rgba(0,0,0,.1),0 2px 4px -1px rgba(0,0,0,.06)}.shadow-lg,.shadow-md{box-shadow:var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)}.shadow-lg{--tw-shadow:0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -2px rgba(0,0,0,.05)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}*,:after,:before{--tw-ring-inset:var(--tw-empty,!*!*! !*!*!);--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgba(59,130,246,.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color)}.focus\:ring:focus,.ring-1{box-shadow:var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow,0 0 #0000)}.focus\:ring:focus{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color)}.ring-black{--tw-ring-opacity:1;--tw-ring-color:rgba(0,0,0,var(--tw-ring-opacity))}.ring-gray-300{--tw-ring-opacity:1;--tw-ring-color:rgba(209,213,219,var(--tw-ring-opacity))}.focus\:ring-indigo-200:focus{--tw-ring-opacity:1;--tw-ring-color:rgba(199,210,254,var(--tw-ring-opacity))}.ring-opacity-5{--tw-ring-opacity:0.05}.focus\:ring-opacity-50:focus{--tw-ring-opacity:0.5}.filter{--tw-blur:var(--tw-empty,!*!*! !*!*!);--tw-brightness:var(--tw-empty,!*!*! !*!*!);--tw-contrast:var(--tw-empty,!*!*! !*!*!);--tw-grayscale:var(--tw-empty,!*!*! !*!*!);--tw-hue-rotate:var(--tw-empty,!*!*! !*!*!);--tw-invert:var(--tw-empty,!*!*! !*!*!);--tw-saturate:var(--tw-empty,!*!*! !*!*!);--tw-sepia:var(--tw-empty,!*!*! !*!*!);--tw-drop-shadow:var(--tw-empty,!*!*! !*!*!);filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-duration:.15s;transition-property:background-color,border-color,color,fill,stroke,opacity,box-shadow,transform,filter,-webkit-backdrop-filter;transition-property:background-color,border-color,color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter;transition-property:background-color,border-color,color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;transition-timing-function:cubic-bezier(.4,0,.2,1)}.duration-75{transition-duration:75ms}.duration-150{transition-duration:.15s}.duration-200{transition-duration:.2s}.ease-in{transition-timing-function:cubic-bezier(.4,0,1,1)}.ease-out{transition-timing-function:cubic-bezier(0,0,.2,1)}.ease-in-out{transition-timing-function:cubic-bezier(.4,0,.2,1)}@media (min-width:640px){.sm\:-my-px{margin-bottom:-1px;margin-top:-1px}.sm\:mt-0{margin-top:0}.sm\:mt-4{margin-top:1rem}.sm\:ml-6{margin-left:1.5rem}.sm\:ml-10{margin-left:2.5rem}.sm\:ml-auto{margin-left:auto}.sm\:block{display:block}.sm\:flex{display:flex}.sm\:hidden{display:none}.sm\:max-w-md{max-width:28rem}.sm\:flex-row{flex-direction:row}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-center{justify-content:center}.sm\:rounded-lg{border-radius:.5rem}.sm\:rounded-t-lg{border-top-left-radius:.5rem;border-top-right-radius:.5rem}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-4xl{font-size:2.25rem;line-height:2.5rem}}@media (min-width:768px){.md\:mt-0{margin-top:0}.md\:mb-0{margin-bottom:0}.md\:ml-auto{margin-left:auto}.md\:w-1\/2{width:50%}.md\:flex-row{flex-direction:row}.md\:items-start{align-items:flex-start}.md\:pl-16{padding-left:4rem}.md\:text-left{text-align:left}}@media (min-width:1024px){.lg\:w-full{width:100%}.lg\:max-w-lg{max-width:32rem}.lg\:flex-grow{flex-grow:1}.lg\:px-8{padding-left:2rem;padding-right:2rem}.lg\:pl-24{padding-left:6rem}}@media print{.print\:mt-2{margin-top:.5rem}.print\:mt-16{margin-top:4rem}.print\:mt-60{margin-top:15rem}.print\:flex{display:flex}.print\:w-1\/2{width:50%}.print\:w-1\/4{width:25%}.print\:w-3\/4{width:75%}.print\:min-w-full{min-width:100%}.print\:table-fixed{table-layout:fixed}.print\:flex-row{flex-direction:row}.print\:flex-col{flex-direction:column}.print\:items-start{align-items:flex-start}.print\:justify-center{justify-content:center}.print\:justify-between{justify-content:space-between}.print\:justify-around{justify-content:space-around}.print\:border-2{border-width:2px}.print\:border{border-width:1px}.print\:border-t{border-top-width:1px}.print\:border-l{border-left-width:1px}.print\:border-black{--tw-border-opacity:1;border-color:rgba(0,0,0,var(--tw-border-opacity))}.print\:px-2{padding-left:.5rem;padding-right:.5rem}.print\:py-2{padding-bottom:.5rem;padding-top:.5rem}.print\:pt-36{padding-top:9rem}.print\:pr-1{padding-right:.25rem}.print\:pr-2{padding-right:.5rem}.print\:pr-36{padding-right:9rem}.print\:pl-2{padding-left:.5rem}.print\:text-center{text-align:center}.print\:text-right{text-align:right}.print\:text-sm{font-size:.875rem;line-height:1.25rem}.print\:font-bold{font-weight:700}.print\:text-black{--tw-text-opacity:1;color:rgba(0,0,0,var(--tw-text-opacity))}}*/

    </style>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body onload="window.print()">
<div class="A4">
    {{-- START Header--}}
    <div>
        <div class="text-xl font-bold text-center">AlHassan Diabetes Center</div>
        <header class="print:flex print:flex-row print:justify-between">
            <div class="print:text-sm print:flex-col">
                <p class="print:flex print:flex-row">Visit Date: {{ $patientInfo->created_at }}</p>
                <p>{{ '#' . $patientInfo->id }}</p>
            </div>
            <div></div>
            <div></div>
        </header>
    </div>
    <div>
        <div class="print:flex print:flex-row print:justify-center print:px-1">
            <p>Patient Record Form</p>
        </div>
    </div>
    {{-- END Header --}}

    {{-- START Body --}}
    <div class="print:border-1 print:border-black print:font-bold mt-6">
        <table class="print:table-fixed print:text-xs print:mt-2 print:min-w-full print:mt-2 print:border print:border-black"  style="font-size: 10px">
            <tbody>
            <tr class="print:border print:border-black ">
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="3"><span>Full Name: </span><span>{{ $patientInfo->full_name }}</span></th>
            </tr>
            <tr class="print:border print:border-black ">
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="3"></td>
            </tr>
            <tr class="print:border print:border-black " >
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Date of Birth: </span><span>{{ $patientInfo->birthday }}</span></th>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="2"><span>Phone: </span><span>{{ $patientInfo->phone }}</span></th>
            </tr>
            <tr class="print:border print:border-black ">
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="2"></td>
            </tr>
            <tr class="print:border print:border-black " >
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Gender: </span><span>{{ $patientHistory->gender }}</span></th>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="2"><span>Occupation: </span><span>{{ $patientInfo->occupation }}</span></th>
            </tr>
            <tr class="print:border print:border-black ">
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="2"></td>
            </tr>
            <tr class="print:border print:border-black " >
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Educational Qualification: </span><span>{{ $patientInfo->education_qualification }}</span></th>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Marital Status: </span><span>{{ $patientInfo->marital_status }}</span></th>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Social Status: </span><span>{{ $patientInfo->social_status }}</span></th>
            </tr>
            <tr class="print:border print:border-black ">
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>
            </tr>
            <tr class="print:border print:border-black ">
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="3"><span>Address: </span><span>{{ $patientInfo->address }}</span></th>
            </tr>
            <tr class="print:border print:border-black ">
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="3"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="print:border-1 print:border-black print:font-bold mt-4">
        <table class="print:table-fixed print:text-xs print:mt-2 print:min-w-full print:mt-2 print:border print:border-black"  style="font-size: 10px">
            <tbody>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Smoker</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->smoker)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Drinker</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->drinker)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Family History of DM</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->family_dm)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Gestational DM</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->gestational_dm)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Weight at birth 4.5Kg</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->weight_baby)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Hypertension</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->hypertension)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Family History of IHD</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->family_ihd)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">SMBG</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->smbg)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">IHD</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->ihd)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">CVA</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->cva)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">PVD</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->pvd)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Neuropathy</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->neuropathy)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Parity</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white" colspan="5"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="print:border-1 print:border-black print:font-bold mt-4">
        <table class="print:table-fixed print:text-xs print:mt-2 print:min-w-full print:mt-2 print:border print:border-black"  style="font-size: 10px">
            <tbody>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Weight (Kg)</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->weight }}</td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Insulin</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->insulin)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Date of Insulin (Years)</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientInfo->duration_insulin }}</td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Height (cm)</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->height }}</td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Amputation</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->amputation)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Duration of DM (Years)</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientInfo->duration_dm }}</td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">WC (cm)</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->waist_circumference }}</td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">ED</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->ed)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Father’s Height</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->father_height }}</td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">BMI</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->bmi }}</td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">NAFLD</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->nafld)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Mother’s Height</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->mother_height }}</td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">HIP (cm)</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->hip }}</td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Dermopathy</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->dermopathy)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Mid-parental Height</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientHistory->mid_height }}</td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Retinopathy</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->retinopathy)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Diabetic Foot</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->diabetic_food)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">First A1c</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">{{ $patientInfo->first_a1c }}</td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">No Proliferative DR</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->non_proliferative)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Lipid Control</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->lipid_control)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"></th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white"></td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Proliferative DR</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->proliferative_dr)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Pressure Control</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->pressure_control)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"></th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white"></td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Maculopathy</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->maculopathy)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Glycemic Control</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white">
                    @if ($patientInfo->glycemic_control)
                        <span class="px-1"><input type="checkbox" checked/><label>Y</label></span>
                        <span class="px-1"><input type="checkbox"/><label>N</label></span>
                    @else
                        <span class="px-1"><input type="checkbox" /><label>Y</label></span>
                        <span class="px-1"><input type="checkbox" checked/><label>N</label></span>
                    @endif
                </td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"></th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white"></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="print:border-1 print:border-black print:font-bold mt-4">
        <table class="print:table-fixed print:text-xs print:mt-2 print:min-w-full print:mt-2 print:border print:border-black"  style="font-size: 10px">
            <tbody>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Medical Notes: </span></th>
            </tr>
            <tr>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-right print:bg-white">
                    <textarea name="" id="" cols="30" rows="10" style="text-align: right;" dir="RTL">
                        {{ $patientHistory->clinical_notes }}
                    </textarea>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="print:border-1 print:border-black print:font-bold mt-4">
        <table class="print:table-fixed print:text-xs print:mt-2 print:min-w-full print:mt-2 print:border print:border-black"  style="font-size: 10px">
            <tbody>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Doctor: </span><span>{{ $patientHistory->clinical_notes }}</span></th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white w-1/4"></td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Reception: </span><span></span></th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white w-1/4"></td>
            </tr>
            <tr>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Date & Signature:</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white w-1/4"></td>
                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200">Date & Signature:</th>
                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white w-1/4"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
    {{-- END Body --}}


{{--START Close browser tab after printing or Cancel--}}
<script>
    function PrintWindow() {
        window.print();
        CheckWindowState();
    }



    function CheckWindowState() {
        if (document.readyState === "complete" || document.readyState === "cancel") {
            window.close();
        } else {
            setTimeout("CheckWindowState()", 100)
        }
    }

    PrintWindow();



</script>
{{--END Close browser tab after printing or Cancel--}}

</body>
</html>
