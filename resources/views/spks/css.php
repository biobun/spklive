#DivToShow {
            opacity: 0;
        }

        td:hover #DivToShow {
            opacity: 1;
        }

        .hidden-button {
            /* opacity: 0; */
        }

        td:hover .hidden-button {
            opacity: 1;
        }

        .child {
            /* z-index: 10; */
            position: absolute;
            /* position: relative; */
            /* top: 50%; */
        }

        .parent {
            position: relative;
            /* position: absolute; */
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }