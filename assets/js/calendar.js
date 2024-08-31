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
      url: "calendarfetch",
      data: {
        calendarfetch: {
          start: info.startStr,
          end: info.endStr,
        },
      },
      success: function (response) {
        console.log(JSON.parse(response));

        successCallback(JSON.parse(response));
      },
    });
    // console.log((data));
    // successCallback((data));
  }

  function clickonEvent(info) {
    // alert("Event: " + info.startStr);
    // alert("Event: " + info.event.id);
    // console.log(info.event.startStr);

    // console.log(info);


    if (info.event.backgroundColor != "gray") {
      if (info.event.extendedProps.event_status != 0) {
        showmodal(
          "user_calendarevent",
          info.event.extendedProps.masalah,
          info.event.id,
          info.event.startStr
        );
      } else {
        showtoast("rejected");
      }
    }
    // }}
    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    // alert("View: " + info.view.type);

    // change the border color just for fun
    // info.el.style.borderColor = "red";
  }

  function selectDate(info) {
    // var title = prompt("Event Title:");
    // console.log(info)

    const user_id = document.getElementById("user_calendaradd_id").value;
    showmodal("user_calendaradd", null, user_id, info.startStr, info.title);

    calendar.unselect();
  }

  function checkoverlapself(info) {
    // console.log(info.backgroundColor)
    console.log(info)
    // console.log(info.extendedProps.user_id)
// const id = document.getElementById("calendar_user_id").innerHTML;
    // if (id == info.event.extendedProps.user_id) {
    //   console.log("asdsa")
    //   // console.log(info.event.start)
    // }
    // showtoast("event exist pls choose anotjer");

    // return;
  }


  const calendarEl = document.getElementById("calendar");

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
    },
    // allDay: true,
    dayMaxEventRows: 2,
        eventOrder: "-title",
    events: getAllEvents,
    lazyFetching: true,
    selectable: true,
    selectHelper: true,
    selectConstraint: {
      start: "00:01",
      end: "23:59",
    },
    selectOverlap: checkoverlapself,
    eventOverlap: false,
    select: selectDate,
    eventClick: clickonEvent,
    hiddenDays: [0, 6],
  });
  calendar.render();

  $("#user_calendaradd_button").click(function () {
    calendar_add("user_calendaradd");
  });

  $("#user_calendarevent_button").click(function () {
    console.log("testasda");
    calendar_delete("user_calendarevent");
  });

  function calendar_add(id) {
    const date = document.getElementById("user_calendaradd_date").value;
    const title = document.getElementById("user_calendaradd_content").value;
    const user_id = document.getElementById("user_calendaradd_id").value;

    // console.log(date);
    // console.log(title);
    // console.log(user_id);

    if (title) {
      $.ajax({
        type: "POST",
        url: "calendaraddna",
        data: {
          calendaraddna: {
            user_id: user_id,
            title: title,
            start: date,
          },
        },
        success: function (response) {
          showtoast("added");

          // alert(id);
          // calendar.render();
          // var script = $(response).text();
          // console.log((script));

          // eval(script);
          // successCallback(response);
        },
      });
    }
    // calendar.render();
    calendar.refetchEvents();

    $("#" + id).modal("hide");
    document.getElementById("user_calendaradd_title").value = "";

    // var myModalEl = document.getElementById(id)

    // $(id);
  }

  function calendar_delete(id) {
    const date = document.getElementById(id + "_date").value;
    const title = document.getElementById(id + "_title").value;
    const user_id = document.getElementById(id + "_id").value;
    // console.log(user_id);

    $.ajax({
      type: "POST",
      url: "calendardeletena",
      data: {
        calendardeletena: {
          user_id: user_id,
          // title: title,
          // start: date,
        },
      },
      success: function (response) {
        // console.log(response);
        showtoast("deleted");
        calendar.refetchEvents();

        // if (response) {
        //   showtoast(response);
        // }
        // alert(id);
        // calendar.render();
        // var script = $(response).text();
        // console.log((script));

        // eval(script);
        // successCallback(response);
      },
    });

    // calendar.render();

    $("#" + id).modal("hide");
    document.getElementById(id + "_title").value = "";

    // var myModalEl = document.getElementById(id)

    // $(id);
  }
});
