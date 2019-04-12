import { Component, OnInit } from '@angular/core';
import { SharedDataOrchartService } from '../services/shared-data-orchart.service';
import { map, filter } from 'rxjs/operators';


@Component({
  selector: 'app-shared-json',
  templateUrl: './shared-json.component.html',
  styleUrls: ['./shared-json.component.css'],
  providers: [ SharedDataOrchartService]
})



export class SharedJsonComponent implements OnInit {
  public users: any[];
  title = 'TEST';
  searchTest;
  constructor(public SharedDataOrchart: SharedDataOrchartService) { }

  ngOnInit() {
    this.SharedDataOrchart.
                      getUsers().
                      subscribe((data: any) => this.users = data);


}
}
