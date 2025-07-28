<style>
  .dash-pic img {
    width: 100%;
    height: 100%;

  }

  .dash-pic {
    display: flex;
    justify-content: center;
    width: 300px;
    height: 350px;
    align-items: center;
    border-radius: 30px;
    overflow: hidden;
  }

  .dash-pic img {
    width: 460px;
  }

  .xyz {
    display: flex;
    align-items: center;
    justify-content: space-around;
  }

  /* .typewriter {
    font-size: 55px;
    
    white-space: nowrap;
    overflow: hidden;
    text-align: center;
    margin-top: 50px;
    font-weight: 700;
}

    .blinking-cursor {
      display: inline-block;
      width: 10px;
      background-color: black;
      animation: blink 0.7s steps(2, start) infinite;
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    } */

  @import url("https://fonts.googleapis.com/css2?family=Russo+One&display=swap");

  .aaa {
    font-family: "Russo One", sans-serif;
    width: 100%;
    height: 300px;
  }

  .aaa text {
    animation: stroke 5s infinite alternate;
    stroke-width: 2;
    stroke: #365FA0;
    font-size: 54px;
  }

  @keyframes stroke {
    0% {
      fill: rgba(72, 138, 204, 0);
      stroke: rgba(54, 95, 160, 1);
      stroke-dashoffset: 25%;
      stroke-dasharray: 0 50%;
      stroke-width: 2;
    }

    70% {
      fill: rgba(72, 138, 204, 0);
      stroke: rgba(54, 95, 160, 1);
    }

    80% {
      fill: rgba(72, 138, 204, 0);
      stroke: rgba(54, 95, 160, 1);
      stroke-width: 3;
    }

    100% {
      fill: rgba(72, 138, 204, 1);
      stroke: rgba(54, 95, 160, 0);
      stroke-dashoffset: -25%;
      stroke-dasharray: 50% 0;
      stroke-width: 0;
    }
  }
</style>
  <div class="midde_cont">
     <div class="container-fluid">
        <div class="row column_title">
           <div class="col-md-12">
              <div class="page_title">
                 <h2>Dashboard</h2>
              </div>
           </div>
        </div>
        <!-- row -->
        <div class="row">
           <svg class="aaa">
              <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                 Welcome To Aryan Group Admin Panel
              </text>
           </svg>




        </div>
     </div>