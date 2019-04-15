import { EmailValidator } from '@angular/forms';

export class User {

  id: number;
  email: string;
  lastName: string;
  firstName: string;
  birthDate: number;
  username: string;
  technos: string;
  newTechnos: string;
  poste: number;
  adress: any;
  newAdress: any;
  userType: number;

  //Both the passwords are in a single object
  password: {
    pwd: string;
    confirmPwd: string;
  };
  gender: string;
  terms: boolean;

  constructor(values: Object = {}) {
    //Constructor initialization
    Object.assign(this, values);
}

}
