import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/operator/map';



@Injectable({
  providedIn: 'root'
})
export class UserFormDataSignupService{

 BASE_URL = 'http://localhost:8000/';

  constructor(private http:HttpClient) { }

  public getCreateUser(user){
            console.log(user);
    return this.http.post(this.BASE_URL + 'user/add', user)
                  .map(res => res);

  }



}
