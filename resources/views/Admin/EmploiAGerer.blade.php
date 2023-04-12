<div class="container ">

    <div class="row">
        <div class="col-md-12">
            <div class="schedule-table">
                <!-- resources/views/timetable/index.blade.php -->
                <table class="table bg-white" style="border-spacing: 2px; border-collapse:separate;">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="seance-1">8:30 - 10:00</th>
                            <th class="seance-2">10:30 - 12:30</th>
                            <th class="seance-3">14:30 - 16:00</th>
                            <th class="seance-4">16:30 - 18:00</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($days as $day)
                            <tr>
                                <td class="day">{{ $day }}</td>
                                <td class="active" data-day="{{ $day }}" data-session="1">
                                    @if ($timetable[$day][1] != '')
                                        {!! $timetable[$day][1] !!}
                                        <p>8:30 - 10:00</p>
                                    @endif
                                </td>
                                <td class="active" data-day="{{ $day }}" data-session="2">
                                    @if ($timetable[$day][2] != '')
                                        {!! $timetable[$day][2] !!}
                                        <p>10:30 - 12:00</p>
                                    @endif
                                </td>

                                <td class="active" data-day="{{ $day }}" data-session="3">
                                    @if ($timetable[$day][3] != '')
                                        {!! $timetable[$day][3] !!}
                                        <p>14:30 - 16:00</p>
                                    @endif
                                </td>
                                <td class="active" data-day="{{ $day }}" data-session="4">
                                    @if ($timetable[$day][4] != '')
                                        {!! $timetable[$day][4] !!}
                                        <p>16:30 - 18:00</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>




                {{-- <table class="table bg-white">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="seance-1">8:30 - 10::00</th>
                            <th class="seance-2">10:30 - 12:30</th>
                            <th></th>
                            <th class="seance-3">14:30 - 16:00</th>
                            <th class="seance-4" class="last">16:30 - 18:00</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day">Lundi</td>
                            <td class="active" data-day="monday" data-session="1">
                                <h4>aLGORITHMS</h4>
                                <p>8:30 - 10::00</p>
                                <div class="hover">
                                    <h4>Weight Loss</h4>
                                    <p>10 am - 11 am</p>
                                    <span>Wayne Ponce</span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td class="active" data-day="monday" data-session="3">
                                <h4>JAVA</h4>
                                <p>14:30 - 16:00</p>
                                <div class="hover">
                                    <h4>Boxing</h4>
                                    <p>05 pm - 046am</p>
                                    <span>Charles King</span>
                                </div>
                            </td>
                            <td class="active" data-day="monday" data-session="3">
                                <h4>JAVA</h4>
                                <p>16:30 - 18:00</p>
                                <div class="hover">
                                    <h4>Boxing</h4>
                                    <p>05 pm - 046am</p>
                                    <span>Charles King</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day">Mardi</td>
                            <td></td>
                            <td class="active">
                                <h4>ENGLISH</h4>
                                <p>11 am - 12 pm</p>
                                <div class="hover">
                                    <h4>Cycling</h4>
                                    <p>11 am - 12 pm</p>
                                    <span>Tabitha Potter</span>
                                </div>
                            </td>
                            <td class="active">
                                <h4>Karate</h4>
                                <p>03 pm - 05 pm</p>
                                <div class="hover">
                                    <h4>Karate</h4>
                                    <p>03 pm - 05 pm</p>
                                    <span>Lester Gray</span>
                                </div>
                            </td>
                            <td></td>
                            <td class="active">
                                <h4>Crossfit</h4>
                                <p>07 pm - 08 pm</p>
                                <div class="hover">
                                    <h4>Crossfit</h4>
                                    <p>07 pm - 08 pm</p>
                                    <span>Candi Yip</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day">Mercredi</td>
                            <td class="active">
                                <h4>Spinning</h4>
                                <p>10 am - 11 am</p>
                                <div class="hover">
                                    <h4>Spinning</h4>
                                    <p>10 am - 11 am</p>
                                    <span>Mary Cass</span>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td class="active">
                                <h4>Bootcamp</h4>
                                <p>05 pm - 06 pm</p>
                                <div class="hover">
                                    <h4>Bootcamp</h4>
                                    <p>05 pm - 06 pm</p>
                                    <span>Brenda Mastropietro</span>
                                </div>
                            </td>
                            <td class="active">
                                <h4>Boxercise</h4>
                                <p>07 pm - 08 pm</p>
                                <div class="hover">
                                    <h4>Boxercise</h4>
                                    <p>07 pm - 08 pm</p>
                                    <span>Marlene Bruce</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day">Jeudi</td>
                            <td class="active">
                                <h4>Body Building</h4>
                                <p>10 am - 12 pm</p>
                                <div class="hover">
                                    <h4>Body Building</h4>
                                    <p>10 am - 12 pm</p>
                                    <span>Brenda Hester</span>
                                </div>
                            </td>
                            <td></td>
                            <td class="active">
                                <h4>Dance</h4>
                                <p>03 pm - 05 pm</p>
                                <div class="hover">
                                    <h4>Dance</h4>
                                    <p>03 pm - 05 pm</p>
                                    <span>Brian Ashworth</span>
                                </div>
                            </td>
                            <td></td>
                            <td class="active">
                                <h4>Health</h4>
                                <p>07 pm - 08 pm</p>
                                <div class="hover">
                                    <h4>Health</h4>
                                    <p>07 pm - 08 pm</p>
                                    <span>Mark Croteau</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="day">Vendredi</td>
                            <td></td>
                            <td class="active">
                                <h4>Bootcamp</h4>
                                <p>11 am - 12 pm</p>
                                <div class="hover">
                                    <h4>Bootcamp</h4>
                                    <p>1 am - 12 pm</p>
                                    <span>Elisabeth Schreck</span>
                                </div>
                            </td>
                            <td></td>
                            <td class="active">
                                <h4>Boday Building</h4>
                                <p>05 pm - 06 pm</p>
                                <div class="hover">
                                    <h4>Boday Building</h4>
                                    <p>05 pm - 06 pm</p>
                                    <span>Edward Garcia</span>
                                </div>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
</div>
