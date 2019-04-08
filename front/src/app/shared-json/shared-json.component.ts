import { Component, OnInit } from '@angular/core';
import { SharedDataOrchartService } from '../shared-data-orchart.service';

@Component({
  selector: 'app-shared-json',
  templateUrl: './shared-json.component.html',
  styleUrls: ['./shared-json.component.css'],
  providers: [ SharedDataOrchartService]
})



export class SharedJsonComponent implements OnInit {
  public users: any[];

  constructor(public SharedDataOrchart: SharedDataOrchartService) { }

  ngOnInit() {
    this.SharedDataOrchart.
                      getUsers().
                      subscribe((data: any) => this.users = data);

}
}
