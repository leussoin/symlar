import { Component, OnInit } from '@angular/core';
import { SharedDataOrchartService } from '../services/shared-data-orchart.service';
import { map, filter } from 'rxjs/operators';
import { DescendingArrayPipe } from '../pipe/descending-array.pipe';
import { template } from '@angular/core/src/render3';

@Component({
  selector: 'app-shared-json',
  templateUrl: './shared-json.component.html',
  styleUrls: ['./shared-json.component.css'],
  providers: [ SharedDataOrchartService, DescendingArrayPipe ]
})



export class SharedJsonComponent implements OnInit {
  public users: any[];
  title = 'TABLEAU USERS';
  searchTest;
  constructor(public SharedDataOrchart: SharedDataOrchartService) { }



  addCroissant(){

          return DescendingArrayPipe;
  }



  addDecroissant(){
     return 'ok';
  }



  ngOnInit() {
    this.SharedDataOrchart.
                      getUsers().
                      subscribe((data: any) => this.users = data);


}
}
