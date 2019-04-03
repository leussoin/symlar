import { Component, OnInit } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClientModule } from '@angular/common/http';

@Component({
  selector: 'app-auth',
  templateUrl: './auth.component.html',
  styleUrls: ['./auth.component.css']
})
export class AuthComponent implements OnInit {

  constructor(private http: HttpClientModule) { }

  ngOnInit() {
  }

}
