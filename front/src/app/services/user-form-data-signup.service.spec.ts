import { TestBed } from '@angular/core/testing';

import { UserFormDataSignupService } from './user-form-data-signup.service';

describe('UserFormDataSignupService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: UserFormDataSignupService = TestBed.get(UserFormDataSignupService);
    expect(service).toBeTruthy();
  });
});
