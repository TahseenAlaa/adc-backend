<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Info</title>

    <style>
        .A7 {
            max-width: 7.4cm;
            max-height: 10.5cm;
            background: white;
            display: block;
            margin: 0 auto 0 auto;
        }

    </style>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body onload="window.print()">
<div class="A7">
    {{-- START Header--}}
    <div>
        <div class="text-sm font-bold text-center" style="font-size: 20px">AlHassan Diabetes Center</div>
        <div>
            <div class="print:flex print:flex-row print:justify-center print:px-4 my-2">
                <p>Patient Record Form</p>
            </div>
            <hr>
        </div>
        <header class="print:flex print:flex-row print:justify-between my-4">
            <p class="print:flex print:flex-row">19/10/2022</p>
            <div></div>
            <div class="print:text-sm print:flex-col">
                <div>{{ $patientInfo->id . '#' }}</div>
            </div>
        </header>
    </div>
    {{-- END Header --}}

{{--    START Body--}}
    <div class="print:mt-4">
        <div class="print:flex print:flex-row print:justify-between">
            <span></span>
            <p><span>الاسم: </span><span>{{ $patientInfo->full_name }}</span></p>
        </div>
        <div class="print:flex print:flex-row print:justify-between pt-2">
            <span></span>
            <p><span>الهاتف: </span><span>{{ $patientInfo->phone }}</span></p>
        </div>
    </div>
    <div>
        <link rel="stylesheet" href="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=Tahseen&choe=UTF-8">
    </div>

    <div class="print:flex print:flex-row print:justify-center pt-12 mt-24">
        <p>شكرا لتعاونكم معنا</p>
    </div>
{{--    END Body--}}

    {{-- START Body --}}
{{--    <div class="print:border-1 print:border-black print:font-bold mt-6">--}}
{{--        <table class="print:table-fixed print:text-xs print:mt-2 print:min-w-full print:mt-2 print:border print:border-black"  style="font-size: 10px">--}}
{{--            <tbody>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="3"><span>Full Name - </span><span>الاسم الكامل باللغة العربية</span></th>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="3"></td>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black " >--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Date of Birth - </span><span>تاريخ الميلاد</span></th>--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="2"><span>Phone - </span><span>رقم الهاتف</span></th>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="2"></td>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black " >--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Gender - </span><span>الجنس</span></th>--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="2"><span>Occupation - </span><span>الوظيفة</span></th>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="2"></td>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black " >--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Educational Qualification  - </span><span>التحصيل الدراسي</span></th>--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Marital Status - </span><span>الحالة الزوجية</span></th>--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200"><span>Social Status - </span><span>الحالة الاجتماعية</span></th>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5"></td>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <th class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-gray-200" colspan="3"><span>Address - </span><span>العنوان</span></th>--}}
{{--            </tr>--}}
{{--            <tr class="print:border print:border-black ">--}}
{{--                <td class="print:border print:border-black print:py-1 print:pr-2 print:text-left print:bg-white h-5" colspan="3"></td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
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
