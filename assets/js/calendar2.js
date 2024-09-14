/* global FullCalendar */

/**
 * --------------------------------------------------------------------------
 * CoreUI PRO Boostrap Admin Template calendar.js
 * License (https://coreui.io/pro/license)
 * --------------------------------------------------------------------------
 */

document.addEventListener("DOMContentLoaded", () => {
  function getAllEvents(info, successCallback, failureCallback) {
    // console.log((info.startStr));
    // console.log((info.endStr));

    $.ajax({
      type: "POST",
      url: "calendarfetch2",
      data: {
        calendarfetch2: {
          start: info.startStr,
          end: info.endStr,
        },
      },
      success: function (response) {
        console.log(JSON.parse(response));

        successCallback(JSON.parse(response));
      },
    });
  }

  function clickonEvent(info) {
    console.log(info.event);

    document.getElementById("user_info").src =
      document.getElementById("user_info").getAttribute("data-urlsite") +
      info.event.extendedProps.user_id +
      "/" +
      info.event.extendedProps.image_url;

    document.getElementById("kaunselor_updateevent_title").innerHTML =
      info.event.title;
    document.getElementById("kaunselor_updateevent_id").value =
      info.event.id;
    document.getElementById("kaunselor_updateevent_date").value = new Date(
      info.event.startStr
    ).toLocaleDateString("en-MY");

    document.getElementById("kaunselor_updateevent_nama").value =
      info.event.extendedProps.nama;
    document.getElementById("kaunselor_updateevent_ndp").value =
      info.event.extendedProps.ndp;

    showmodal("kaunselor_updateevent");

    // if (info.event.backgroundColor != "gray") {
    //   if (info.event.extendedProps.event_status != 0) {
    //     showmodal(
    //       "user_calendarevent",
    //       info.event.extendedProps.masalah,
    //       info.event.id,
    //       info.event.startStr
    //     );
    //   } else {
    //     showtoast("rejected");
    //   }
    // }
  }

  // function selectDate(info) {
  //   // var title = prompt("Event Title:");

  //   const user_id = document.getElementById("user_calendaradd_id").value;
  //   showmodal("user_calendaradd", null, user_id, info.startStr, info.title);

  //   calendar.unselect();
  // }

  const calendarEl = document.getElementById("calendar");

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
    },
    // allDay: true,
    events: getAllEvents,
    lazyFetching: true,
    // selectable: true,
    // selectHelper: true,
    // selectConstraint: {
    //   start: "00:01",
    //   end: "23:59",
    // },

    // select: selectDate,
    eventClick: clickonEvent,
    hiddenDays: [0, 6],
  });
  calendar.render();

  $("#kaunselor_updateevent_button1").click(function () {
    // calendar_add("user_calendaradd");
    console.log("reject");
    hidemodal();
    //  coreui.Modal("#kaunselor_updateevent");
    $.ajax({
      type: "POST",
      url: "kaunselor_reject",
      data: {
        kaunselor_reject: {
          start: info.startStr,
          end: info.endStr,
        },
      },
      success: function (response) {
        console.log(JSON.parse(response));

        successCallback(JSON.parse(response));
      },
    });
  });

  $("#kaunselor_updateevent_button2").click(function () {
    console.log("approve");
    // calendar_delete("user_calendarevent");
  });
});
