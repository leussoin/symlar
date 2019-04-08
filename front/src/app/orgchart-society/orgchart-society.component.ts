import { Component, OnInit } from '@angular/core';
import { IEmployee } from '../employee';


@Component({
  selector: 'app-orgchart-society',
  templateUrl: './orgchart-society.component.html',
  styleUrls: ['./orgchart-society.component.css'],

})
export class OrgchartSocietyComponent implements OnInit {

  public employee: IEmployee;


/*OrgChart Society*/
  topEmployee: IEmployee = {

    name: ` WEB-ATRIO`,
    designation: 'Free Society',
    img: "./assets/data/img/a.JPG",
    subordinates: [
        {
            name: 'Matthew Wikes',
            designation: 'VP',
            img: "./assets/data/img/a.JPG",
            subordinates: [
                {
                    name: 'Tina Landry',
                    designation: 'Budget Analyst',
                    img:'./assets/data/img/a.JPG',
                    subordinates: []
                }

            ]
        },
        {
            name: 'Patricia Lyons',
            designation: 'VP',
            img: "./assets/data/img/a.JPG",
            subordinates: [
                {
                    name: 'Dylan Wilson',
                    designation: 'Web Manager',
                    img: "./assets/data/img/a.JPG",
                    subordinates: []
                },
                {
                    name: 'Deb Curtis',
                    designation: 'Art Director',
                    img: "./assets/data/img/a.JPG",
                    subordinates: []
                }
            ]
        },
        {
            name: 'Larry Phung',
            designation: 'VP',
            img: "./assets/data/img/a.JPG",
            subordinates: []
        },
        {
          name: 'Carl Gins',
          designation: 'VP',
          img: "./assets/data/img/a.JPG",
          subordinates: [
              {
                  name: 'Archibald Composer',
                  designation: 'Web Manager',
                  img: "./assets/data/img/a.JPG",
                  subordinates: []
              },
              {
                  name: 'Dave Been',
                  designation: 'Art Director',
                  img: "./assets/data/img/a.JPG",
                  subordinates: []
              }
          ]
      },
      {
          name: 'John Bloum',
          designation: 'VP',
          img: "./assets/data/img/a.JPG",
          subordinates: [
            {
              name: 'Ollie Parker',
              designation: 'Web Manager',
              img: "./assets/data/img/a.JPG",
              subordinates: []
          },
          {
              name: 'Kevin Cost',
              designation: 'Art Director',
              img: "./assets/data/img/a.JPG",
              subordinates: []
          }
          ]

      }

    ],



  };



  constructor() { }

  ngOnInit() {




  }

}

